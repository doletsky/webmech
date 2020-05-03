$(function () {
  
  //init wowjs - as you scroll animations
  new WOW().init();
  
  // init DataTable
  if (!$.fn.DataTable.isDataTable('#datatable-example')) {
    $('#datatable-example').dataTable({
      "language": {
        "info": "<span class='small'>Records _START_-_END_ of _TOTAL_</span>",
      }
    });
  }

  // set active link on sidebar
  var pathname = window.location.pathname.substring((window.location.pathname.lastIndexOf("/")+1),window.location.pathname.length); 
  
  // remove existing active highlight
  $('.navbar .nav-link.active').each(function() {
    $(this).removeClass('active');
  });
  
  // set current active highlight
  $('.navbar .nav-link[href*="'+pathname+'"]').each(function() {
    $(this).addClass('active');
    $(this).parents('.nav .collapse').eq(0).addClass('show');
  });
  
  $('body').show();
  
});

/* chart.js chart examples */
function initLineChart(colors){
  /* large line chart */
  var chLine = document.getElementById("chLine");
  
  var chartData = {
    labels: ["S", "M", "T", "W", "T", "F", "S"],
    datasets: [{
      label: "Retail",
      fill: true,
      data: [420,410,440,420,460,440,480],
      borderColor: colors[0],
      borderWidth: 4,
      pointBackgroundColor: colors[0],
      hoverBackgroundColor: "#000"
    },
    {
      label: "Online",
      data: [439,465,493,478,480,490,500],
      borderColor: colors[2],
      borderWidth: 4,
      pointBackgroundColor: colors[2],
      hoverBackgroundColor: "#000"
    }]
  };
  if (chLine) {
    new Chart(chLine, {
    type: 'line',
    data: chartData,
    options: {
      scales: {
        yAxes: [{display:false}]
      },
      elements: {
        point: {
          radius: 1
        }
      },
      legend: {
        display: false
      },
      responsive: true
    }
    });
  }
  
  /* large line chart 4 */
  var chLine4 = document.getElementById("chLine4");
  var chartData4 = {
    labels: ["S", "M", "T", "W", "T", "F", "S"],
    datasets: [{
      label: "Online",
      data: [320,310,340,320,360,350,380,370,390,360],
      backgroundColor: 'transparent',
      borderColor: colors[3],
      borderWidth: 4,
      pointBackgroundColor: colors[3],
      hoverBackgroundColor: "#000"
    }]
  };
  if (chLine4) {
    new Chart(chLine4, {
    type: 'line',
    data: chartData4,
    options: {
      scales: {
        yAxes: [{display:false}]
      },
      elements: {
        point: {
          radius: 1
        }
      },
      legend: {
        display: false
      },
      responsive: true
    }
    });
  }
  
  /* large line chart 5 */
  var chLine5 = document.getElementById("chLine5");
  var chartData5 = {
    labels: ["S", "M", "T", "W", "T", "F", "S"],
    datasets: [{
      label: "Retail",
      data: [420,400,440,420,460,440,480,460,500,480],
      backgroundColor: 'transparent',
      borderColor: colors[4],
      borderWidth: 4,
      pointBackgroundColor: colors[4],
      hoverBackgroundColor: "#000"
    }]
  };
  if (chLine5) {
    new Chart(chLine5, {
    type: 'line',
    data: chartData5,
    options: {
      scales: {
        yAxes: [{display:false}]
      },
      elements: {
        point: {
          radius: 1
        }
      },
      legend: {
        display: false
      },
      responsive: true
    }
    });
  }
}

function initPieChart(colors){
  /* large pie/donut chart */
  var chPie = document.getElementById("chPie");
  if (chPie) {
    
    new Chart(chPie, {
      type: 'pie',
      data: {
        labels: ['Desktop', 'Phone', 'Tablet', 'Unknown'],
        datasets: [
          {
            backgroundColor: [colors[1],colors[0],colors[2],colors[5]],
            borderWidth: 0,
            data: [50, 40, 15, 5]
          }
        ]
      },
      plugins: [{
        beforeDraw: function(chart) {
          var width = chart.chart.width,
              height = chart.chart.height,
              ctx = chart.chart.ctx;
          ctx.restore();
          var fontSize = (height / 70).toFixed(2);
          ctx.font = fontSize + "em sans-serif";
          ctx.textBaseline = "middle";
          var text = chart.config.data.datasets[0].data[0] + "%",
              textX = Math.round((width - ctx.measureText(text).width) / 2),
              textY = height / 2;
          ctx.fillText(text, textX, textY);
          ctx.save();
        }
      }],
      options: {layout:{padding:0}, legend:{display:false}, cutoutPercentage: 80}
    });
  }
  
};

function initBarCharts(colors){
  
  /* bar charts */
  var chBarOptions = {
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        barPercentage: 0.4,
        categoryPercentage: 0.5
      }]
    }
  };
  var chBar = document.getElementById("chBar");
  if (chBar) {
    new Chart(chBar, {
    type: 'bar',
    data: {
      labels: ["S", "M", "T", "W", "T", "F", "S"],
      datasets: [{
        data: [589, 445, 483, 503, 689, 692, 634],
        backgroundColor: colors[0]
      },
      {
        data: [639, 465, 493, 478, 589, 632, 674],
        backgroundColor: colors[1]
      }]
    },
    options: chBarOptions
    });
  }
  var chBar1 = document.getElementById("chBar1");
  if (chBar1) {
    new Chart(chBar1, {
    type: 'bar',
    data: {
      labels: ["S", "M", "T", "W", "T", "F", "S"],
      datasets: [{
        data: [589, 445, 483, 503, 689, 692, 634],
        backgroundColor: colors[1]
      },
      {
        data: [389, 345, 583, 523, 669, 642, 504],
        backgroundColor: colors[0]
      },
      {
        data: [400, 445, 483, 503, 689, 692, 634],
        backgroundColor: colors[2]
      },
      {
        data: [339, 565, 493, 578, 519, 532, 574],
        backgroundColor: colors[3]
      }]
    },
    options: chBarOptions
    });
  }
  
}

function initDonutCharts(colors){
  /* 3 donut charts */
  var donutOptions = {
    cutoutPercentage: 85, 
    legend: {position:'bottom', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
  };
  
  // donut 1
  var chDonutData1 = {
      labels: ['Bootstrap', 'Popper', 'Other'],
      datasets: [
        {
          backgroundColor: colors.slice(0,3),
          borderWidth: 0,
          data: [74, 3, 46]
        }
      ]
  };
  
  var chDonut1 = document.getElementById("chDonut1");
  if (chDonut1) {
    new Chart(chDonut1, {
      type: 'pie',
      data: chDonutData1,
      options: donutOptions
    });
  }
  
  // donut 2
  var chDonutData2 = {
      labels: ['Wips', 'Pops', 'Dags'],
      datasets: [
        {
          backgroundColor: colors.slice(0,3),
          borderWidth: 0,
          data: [40, 8, 54]
        }
      ]
  };
  var chDonut2 = document.getElementById("chDonut2");
  if (chDonut2) {
    new Chart(chDonut2, {
      type: 'pie',
      data: chDonutData2,
      options: donutOptions
    });
  }
  
  // donut 3
  var chDonutData3 = {
      labels: ['Angular', 'React', 'Other'],
      datasets: [
        {
          backgroundColor: colors.slice(0,3),
          borderWidth: 0,
          data: [21, 5, 55, 33]
        }
      ]
  };
  var chDonut3 = document.getElementById("chDonut3");
  if (chDonut3) {
    new Chart(chDonut3, {
      type: 'pie',
      data: chDonutData3,
      options: donutOptions
    });
  }
}

function initSmallLineCharts(colors){
  /* 3 line charts */
  var lineOptions = {
      legend:{display:false},
      tooltips:{interest:false,bodyFontSize:11,titleFontSize:11},
      scales:{
        xAxes:[
          {
            ticks:{
              display:false
            },
            gridLines: {
              display:false,
              drawBorder:false
            }
          }
        ],
        yAxes:[{display:false}]
      },
      layout: {
          padding: {
            left: 6,
            right: 6,
            top: 4,
            bottom: 6
          }
      }
  };
  
  var chLine1 = document.getElementById("chLine1");
  if (chLine1) {
    new Chart(chLine1, {
        type: 'line',
        data: {
          labels: ['Jan','Feb','Mar','Apr','May'],
          datasets: [
            {
              backgroundColor:'#ffffff',
              borderColor:'#ffffff',
              data: [10, 11, 4, 11, 4],
              fill: false
            }
          ]
        },
        options: lineOptions
    });
  }
  var chLine2 = document.getElementById("chLine2");
  if (chLine2) {
    new Chart(chLine2, {
        type: 'line',
        data: {
          labels: ['A','B','C','D','E'],
          datasets: [
            {
              backgroundColor:'#ffffff',
              borderColor:'#ffffff',
              data: [4, 5, 7, 13, 12],
              fill: false
            }
          ]
        },
        options: lineOptions
    });
  }
  var chLine3 = document.getElementById("chLine3");
  if (chLine3) {
    new Chart(chLine3, {
        type: 'line',
        data: {
          labels: ['Pos','Neg','Nue','Other','Unknown'],
          datasets: [
            {
              backgroundColor:'#ffffff',
              borderColor:'#ffffff',
              data: [13, 15, 10, 9, 14],
              fill: false
            }
          ]
        },
        options: lineOptions
    });
  }
}

$(function () {
  
  // default chart colors
  var colors = ['#eeeeee','#cfcfcf','#dedede','#444444','#dc3545','#6c757d'];
  var style = getComputedStyle(document.body);
  
  colors[0] = style.getPropertyValue('--primary');
  colors[1] = style.getPropertyValue('--secondary');
  colors[2] = style.getPropertyValue('--dark');
  colors[4] = style.getPropertyValue('--info');
  colors[3] = style.getPropertyValue('--success');
  
  // load charts
  initLineChart(colors);
  initPieChart(colors);
  initBarCharts(colors);
  initDonutCharts(colors);
  initSmallLineCharts(colors);
    
});

/* kanban board drag and drop */
var drag = function(event) {
  event.dataTransfer.setData("text/plain", event.target.id);
}

var allowDrop = function(ev) {
  ev.preventDefault();
  if (hasClass(ev.target,"dropzone")) {
    addClass(ev.target,"droppable");
  }
}

var clearDrop = function(ev) {
  removeClass(ev.target,"droppable");
}

var drop = function(event){
  event.preventDefault();
  var data = event.dataTransfer.getData("text/plain");
  var element = document.querySelector(`#${data}`);
  try {
    // delete the spacer in dropzone
    event.target.removeChild(event.target.firstChild);
    // add the draggable content
    event.target.appendChild(element);
    // remove the dropzone parent
    unwrap(event.target);
  } catch (error) {
    console.warn("can't move the item to the same place")
  }
  updateDropzones();
}

var updateDropzones = function(){
    /* after dropping, refresh the drop target areas
      so there is a dropzone after each item
      using jQuery here for simplicity */
    
    var dz = $('<div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>');
    
    // delete old dropzones
    $('.dropzone').remove();

    // insert new dropdzone after each item   
    dz.insertAfter('.card.draggable');
    
    // insert new dropzone in any empty swimlanes
    $(".items:not(:has(.card.draggable))").append(dz);
};

// task kanban helpers
function hasClass(target, className) {
    return new RegExp('(\\s|^)' + className + '(\\s|$)').test(target.className);
}

function addClass(ele,cls) {
  if (!hasClass(ele,cls)) ele.className += " "+cls;
}

function removeClass(ele,cls) {
  if (hasClass(ele,cls)) {
    var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
    ele.className=ele.className.replace(reg,' ');
  }
}

function unwrap(node) {
    node.replaceWith(...node.childNodes);
}


/* inbox angularjs app */
var inboxApp = angular.module('app', []);
inboxApp.filter('html', ['$sce', 
    function($sce) {
        return function (input, type) {
            if (typeof input === "string") {
                return $sce.trustAs(type || 'html', input);
            }
            return "";
        };
    }
]);
inboxApp.controller('ctrl', function($scope){
    $scope.messages = [
        {"id":1,"from":"Gary Lewis","fromAddress":"test@foofoo.com","subject":"Posting on board","dtSent":"Today, 9:18AM","read":false,"body":"Hey Mark,<br><br>I saw your post on the message board and I was wondering if you still had that item available. Can you call me if you still do?<br><br>Thanks,<br><b>Gary Lewis</b>"},
        {"id":2,"from":"Bob Sutton","fromAddress":"test@testdomain.com","subject":"In Late Today","dtSent":"Today, 8:54AM","read":false,"body":"Mark,<br>I will be in late today due to an appt.<br>v/r Bob","attachment":false},
        {"id":3,"from":"Will Adivo","fromAddress":"test@testbar.com","subject":"New developer","dtSent":"Yesterday, 4:48PM","read":true,"body":"Here is the last resume for the developer position we posted on SO. Please review and let me know your thoughts!","attachment":true},
        {"id":4,"from":"Al Kowalski","fromAddress":"test@domain.com","subject":"RE: New developer","dtSent":"Yesterday, 4:40PM","read":false,"body":"I looked at the resume, but the guy looks like a moron.","priority":1},
        {"id":4,"from":"Beth Maloney","fromAddress":"test@mail.com","subject":"July Reports","dtSent":"3 Days Ago","read":true,"body":"PYC Staff-<br> Our weekly meeting is canceled due to the holiday. Please review and submit your PID report before next week's meeting.<br>Thanks,<br>Beth"},
        {"id":6,"from":"Jason Furgano","fromAddress":"test@domain.com","subject":"New developer","dtSent":"3 Days Ago","read":true,"body":"All,<br>I'd like to introduce Joe Canfigliata our new S/W developer. If you see him in the office introduce yourself and make him feel welcome."},
        {"id":7,"from":"Bob Sutton","fromAddress":"test@test.com","subject":"Tasking request","dtSent":"3 Days Ago","read":true,"body":"Ovi lipsu doir. The message body goes here..."},
        {"id":8,"from":"Will Adivo","fromAddress":"test@test.com","subject":"Proposal for Avid Consulting","dtSent":"3 Days Ago","read":true,"body":"Mark, I reviewed your proposal with Beth and we have a few questions. Let me know when you time to meet."},
        {"id":9,"from":"Philip Corrigan","fromAddress":"test@testdomain.com","subject":"Follow-up Appt.","dtSent":"4 Days Ago","read":true,"body":"Hi,<br>Can you please confirm the expense report I submitted for my last trip to SD?<br>Thanks,<br>Tom Grey"},
    ];
    $scope.unread = $scope.messages.filter(function(o){if(!o.read){return o}});
    $scope.selectItem = function(idx){
        $scope.messages[idx].read = true;
        $scope.selected = $scope.messages[idx];
        $scope.unread = $scope.messages.filter(function(o){if(!o.read){return o}});
    };
});
