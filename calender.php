<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="container theme-showcase">
    <h1>Calendar</h1>
    <div id="holder" class="row"></div>
  </div>
  
  <script type="text/tmpl" id="tmpl">
    {{ 
    var date = date || new Date(),
        month = date.getMonth(), 
        year = date.getFullYear(), 
        first = new Date(year, month, 1), 
        last = new Date(year, month + 1, 0),
        startingDay = first.getDay(), 
        thedate = new Date(year, month, 1 - startingDay),
        dayclass = lastmonthcss,
        today = new Date(),
        i, j; 
    if (mode === 'week') {
      thedate = new Date(date);
      thedate.setDate(date.getDate() - date.getDay());
      first = new Date(thedate);
      last = new Date(thedate);
      last.setDate(last.getDate()+6);
    } else if (mode === 'day') {
      thedate = new Date(date);
      first = new Date(thedate);
      last = new Date(thedate);
      last.setDate(thedate.getDate() + 1);
    }
    
    }}
    <table class="calendar-table table table-condensed table-tight">
      <thead>
        <tr>
          <td colspan="7" style="text-align: center">
            <table style="white-space: nowrap; width: 100%">
              <tr>
                <td style="text-align: left;">
                  <span class="btn-group">
                    <button class="js-cal-prev btn btn-default"><</button>
                    <button class="js-cal-next btn btn-default">></button>
                  </span>
                  <button class="js-cal-option btn btn-default {{: first.toDateInt() <= today.toDateInt() && today.toDateInt() <= last.toDateInt() ? 'active':'' }}" data-date="{{: today.toISOString()}}" data-mode="month">{{: todayname }}</button>
                </td>
                <td>
                  <span class="btn-group btn-group-lg">
                    {{ if (mode !== 'day') { }}
                      {{ if (mode === 'month') { }}<button class="js-cal-option btn btn-link" data-mode="year">{{: months[month] }}</button>{{ } }}
                      {{ if (mode ==='week') { }}
                        <button class="btn btn-link disabled">{{: shortMonths[first.getMonth()] }} {{: first.getDate() }} - {{: shortMonths[last.getMonth()] }} {{: last.getDate() }}</button>
                      {{ } }}
                      <button class="js-cal-years btn btn-link">{{: year}}</button> 
                    {{ } else { }}
                      <button class="btn btn-link disabled">{{: date.toDateString() }}</button> 
                    {{ } }}
                  </span>
                </td>
                <td style="text-align: right">
                  <span class="btn-group">
                    <button class="js-cal-option btn btn-default {{: mode==='year'? 'active':'' }}" data-mode="year">Year</button>
                    <button class="js-cal-option btn btn-default {{: mode==='month'? 'active':'' }}" data-mode="month">Month</button>
                    <button class="js-cal-option btn btn-default {{: mode==='week'? 'active':'' }}" data-mode="week">Week</button>
                    <button class="js-cal-option btn btn-default {{: mode==='day'? 'active':'' }}" data-mode="day">Day</button>
                  </span>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </thead>
      <!-- The rest of the template remains the same, no translation needed -->
    </table>
  </script>

  <script>
    var $currentPopover = null;
    $(document).on('shown.bs.popover', function (ev) {
      var $target = $(ev.target);
      if ($currentPopover && ($currentPopover.get(0) != $target.get(0))) {
        $currentPopover.popover('toggle');
      }
      $currentPopover = $target;
    }).on('hidden.bs.popover', function (ev) {
      var $target = $(ev.target);
      if ($currentPopover && ($currentPopover.get(0) == $target.get(0))) {
        $currentPopover = null;
      }
    });

    $.extend({
      quicktmpl: function (template) {return new Function("obj","var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('"+template.replace(/[\r\t\n]/g," ").split("{{").join("\t").replace(/((^|\}\})[^\t]*)'/g,"$1\r").replace(/\t:(.*?)\}\}/g,"',$1,'").split("\t").join("');").split("}}").join("p.push('").split("\r").join("\\'")+"');}return p.join('');")}
    });

    $.extend(Date.prototype, {
      toDateCssClass:  function () { 
        return '_' + this.getFullYear() + '_' + (this.getMonth() + 1) + '_' + this.getDate(); 
      },
      toDateInt: function () { 
        return ((this.getFullYear()*12) + this.getMonth())*32 + this.getDate(); 
      },
      toTimeString: function() {
        var hours = this.getHours(),
            minutes = this.getMinutes(),
            hour = (hours > 12) ? (hours - 12) : hours,
            ampm = (hours >= 12) ? ' pm' : ' am';
        if (hours === 0 && minutes===0) { return ''; }
        if (minutes > 0) {
          return hour + ':' + minutes + ampm;
        }
        return hour + ampm;
      }
    });

    (function ($) {

      var t = $.quicktmpl($('#tmpl').get(0).innerHTML);
      
      function calendar($el, options) {
        $el.on('click', '.js-cal-prev', function () {
          switch(options.mode) {
          case 'year': options.date.setFullYear(options.date.getFullYear() - 1); break;
          case 'month': options.date.setMonth(options.date.getMonth() - 1); break;
          case 'week': options.date.setDate(options.date.getDate() - 7); break;
          case 'day':  options.date.setDate(options.date.getDate() - 1); break;
          }
          draw();
        }).on('click', '.js-cal-next', function () {
          switch(options.mode) {
          case 'year': options.date.setFullYear(options.date.getFullYear() + 1); break;
          case 'month': options.date.setMonth(options.date.getMonth() + 1); break;
          case 'week': options.date.setDate(options.date.getDate() + 7); break;
          case 'day':  options.date.setDate(options.date.getDate() + 1); break;
          }
          draw();
        }).on('click', '.js-cal-option', function () {
          var $this = $(this),
              mode = $this.data('mode');
          if (mode) {
            options.mode = mode;
            if (mode === 'day' || mode === 'week') {
              options.date = new Date($this.data('date'));
            }
            draw();
          }
        }).on('click', '.js-cal-years', function () {
          var $this = $(this),
              year = $this.text();
          if (year) {
            options.date.setFullYear(year);
            options.mode = 'year';
            draw();
          }
        });
        
        function draw() {
          var html = t(options);
          $el.html(html);
          $('[data-toggle="popover"]').popover();
        }
        
        draw();
      }
      
      $.fn.calendar = function (options) {
        options = $.extend({
          mode: 'month',
          date: new Date()
        }, options || {});
        return this.each(function () {
          calendar($(this), options);
        });
      };
    })(jQuery);
    
    $(function () {
      $('#holder').calendar();
    });
  </script>
</body>
</html>
