"use strict";

!function (NioApp, $) {
  "use strict";

  var runningCampaign = {
    labels: ["01 فروردین", "02 فروردین", "03 فروردین", "04 فروردین", "05 فروردین", "06 فروردین", "07 فروردین"],
    dataUnit: 'کمپین در حال اجرا',
    lineTension: .3,
    datasets: [{
      label: "نفر",
      color: "#fff",
      background: NioApp.hexRGB('#fff', .15),
      data: [85, 125, 105, 115, 130, 106, 141]
    }]
  };
  var totalAudience = {
    labels: ["01 فروردین", "02 فروردین", "03 فروردین", "04 فروردین", "05 فروردین", "06 فروردین", "07 فروردین"],
    dataUnit: 'کمپین در حال اجرا',
    lineTension: 0,
    datasets: [{
      label: "نفر",
      color: "#fff",
      background: NioApp.hexRGB('#fff', .15),
      data: [85, 125, 105, 115, 130, 106, 141]
    }]
  };
  var newSubscriber = {
    labels: ["01 فروردین", "02 فروردین", "03 فروردین", "04 فروردین", "05 فروردین", "06 فروردین", "07 فروردین"],
    dataUnit: 'مشترک',
    lineTension: 0.3,
    datasets: [{
      label: "نفر",
      color: "#fff",
      background: NioApp.hexRGB('#fff', .15),
      data: [85, 125, 105, 115, 130, 106, 141]
    }]
  };
  function campaignLineS1(selector, set_data) {
    var $selector = selector ? $(selector) : $('.campaign-line-chart-s1');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          label: _get_data.datasets[i].label,
          tension: _get_data.lineTension,
          backgroundColor: _get_data.datasets[i].background,
          fill: true,
          borderWidth: 1,
          borderColor: _get_data.datasets[i].color,
          pointBorderColor: 'transparent',
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: _get_data.datasets[i].color,
          pointBorderWidth: 1,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          pointHitRadius: 4,
          data: _get_data.datasets[i].data
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'line',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          plugins: {
            legend: {
              display: _get_data.legend ? _get_data.legend : false,
              rtl: NioApp.State.isRTL,
              labels: {
                boxWidth: 12,
                padding: 20,
                color: '#6783b8'
              }
            },
            tooltip: {
              enabled: true,
              rtl: NioApp.State.isRTL,
              callbacks: {
                label: function label(context) {
                  return "".concat(context.parsed.y, " ").concat(_get_data.dataUnit);
                }
              },
              backgroundColor: '#1c2b46',
              titleFont: {
                size: 10
              },
              titleColor: '#fff',
              titleMarginBottom: 4,
              bodyColor: '#fff',
              bodyFont: {
                size: 10
              },
              bodySpacing: 4,
              padding: 6,
              footerMarginTop: 0,
              displayColors: false
            }
          },
          maintainAspectRatio: false,
          scales: {
            y: {
              display: false,
              ticks: {
                beginAtZero: true,
                font: {
                  size: 12
                },
                color: '#9eaecf',
                padding: 0
              },
              grid: {
                color: NioApp.hexRGB("#526484", .2),
                tickLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2),
                drawTicks: false
              }
            },
            x: {
              display: false,
              ticks: {
                font: {
                  size: 12
                },
                color: '#9eaecf',
                source: 'auto',
                padding: 0,
                reverse: NioApp.State.isRTL
              },
              grid: {
                color: "transparent",
                tickLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2),
                offset: true,
                drawTicks: false
              }
            }
          }
        }
      });
    });
  }
  // init chart
  NioApp.coms.docReady.push(function () {
    campaignLineS1();
  });
  var performanceOverview = {
    labels: ["01 فروردین", "02 فروردین", "03 فروردین", "04 فروردین", "05 فروردین", "06 فروردین", "07 فروردین", "08 فروردین", "09 فروردین", "10 فروردین", "11 فروردین", "12 فروردین", "13 فروردین", "14 فروردین", "15 فروردین", "16 فروردین", "17 فروردین", "18 فروردین", "19 فروردین", "20 فروردین", "21 فروردین", "22 فروردین", "23 فروردین", "24 فروردین", "25 فروردین", "26 فروردین", "27 فروردین", "28 فروردین", "29 فروردین", "30 فروردین", "31 فروردین"],
    dataUnit: 'هدایت',
    lineTension: 0,
    datasets: [{
      label: "کمپین شبکه های اجتماعی",
      color: "#733AEA",
      dash: [0, 0],
      background: "transparent",
      data: [0, 20, 44, 60, 60, 60, 60, 60, 60, 95, 138, 126, 110, 90, 170, 250, 290, 280, 270, 260, 245, 225, 205, 230, 264, 280, 300, 370, 440, 420, 460]
    }, {
      label: "تبلیغات گوگل",
      color: "#FD9722",
      dash: [0, 0],
      background: "transparent",
      data: [100, 85, 80, 65, 75, 90, 115, 130, 150, 170, 185, 195, 240, 280, 320, 325, 330, 340, 350, 335, 325, 315, 305, 295, 330, 370, 390, 420, 480, 550, 600]
    }, {
      label: "دوره های آموزشی",
      color: "#F2426E",
      dash: [0, 0],
      background: "transparent",
      data: [150, 140, 130, 120, 110, 100, 90, 80, 130, 160, 190, 210, 240, 260, 290, 280, 270, 255, 235, 220, 230, 240, 250, 260, 270, 280, 320, 330, 360, 390, 420]
    }, {
      label: "خبرنامه ایمیل",
      color: "#0FCA7A",
      dash: [0, 0],
      background: "transparent",
      data: [200, 180, 165, 150, 135, 120, 105, 90, 140, 180, 220, 260, 280, 290, 300, 360, 320, 290, 240, 260, 270, 280, 320, 300, 340, 400, 460, 500, 550, 570, 600]
    }]
  };
  function campaignLineS2(selector, set_data) {
    var $selector = selector ? $(selector) : $('.campaign-line-chart-s2');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          label: _get_data.datasets[i].label,
          tension: _get_data.lineTension,
          backgroundColor: _get_data.datasets[i].background,
          fill: true,
          borderWidth: 2,
          borderDash: _get_data.datasets[i].dash,
          borderColor: _get_data.datasets[i].color,
          pointBorderColor: 'transparent',
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: _get_data.datasets[i].color,
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 4,
          data: _get_data.datasets[i].data
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'line',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          plugins: {
            legend: {
              display: _get_data.legend ? _get_data.legend : false,
              rtl: NioApp.State.isRTL,
              labels: {
                boxWidth: 12,
                padding: 20,
                color: '#6783b8'
              }
            },
            tooltip: {
              enabled: true,
              rtl: NioApp.State.isRTL,
              callbacks: {
                label: function label(context) {
                  return "".concat(context.parsed.y, " ").concat(_get_data.dataUnit);
                }
              },
              backgroundColor: '#fff',
              borderColor: '#eff6ff',
              borderWidth: 2,
              titleFont: {
                size: 13
              },
              titleColor: '#6783b8',
              titleMarginBottom: 6,
              bodyColor: '#9eaecf',
              bodyFont: {
                size: 12
              },
              bodySpacing: 4,
              padding: 10,
              footerMarginTop: 0,
              displayColors: false
            }
          },
          maintainAspectRatio: false,
          scales: {
            y: {
              display: true,
              position: NioApp.State.isRTL ? "right" : "left",
              ticks: {
                beginAtZero: true,
                font: {
                  size: 12
                },
                color: '#9eaecf',
                padding: 8,
                stepSize: 100,
                border: {
                  dash: [5, 5]
                }
              },
              grid: {
                color: NioApp.hexRGB("#526484", .1),
                tickLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .1),
                border: {
                  dash: [5, 5]
                },
                drawTicks: false
              }
            },
            x: {
              display: false,
              ticks: {
                font: {
                  size: 12
                },
                color: '#9eaecf',
                source: 'auto',
                padding: 0,
                reverse: NioApp.State.isRTL,
                border: {
                  dash: [5, 5]
                }
              },
              grid: {
                color: "transparent",
                tickLength: 0,
                zeroLineColor: 'transparent',
                offset: true,
                border: {
                  dash: [5, 5]
                },
                drawTicks: false
              }
            }
          }
        }
      });
    });
  }
  // init chart
  NioApp.coms.docReady.push(function () {
    campaignLineS2();
  });
  var instagramCampaign = {
    labels: ["01 فروردین", "02 فروردین", "03 فروردین", "04 فروردین", "05 فروردین", "06 فروردین", "07 فروردین", "08 فروردین", "09 فروردین", "10 فروردین", "11 فروردین", "12 فروردین", "13 فروردین", "14 فروردین", "15 فروردین", "16 فروردین", "17 فروردین", "18 فروردین", "19 فروردین", "20 فروردین", "21 فروردین", "22 فروردین", "23 فروردین", "24 فروردین", "25 فروردین", "26 فروردین", "27 فروردین", "28 فروردین", "29 فروردین", "30 فروردین", "31 فروردین"],
    dataUnit: 'هدایت',
    lineTension: .1,
    step: 1000,
    zero: false,
    datasets: [{
      label: "کمپین شبکه های اجتماعی",
      color: "#733AEA",
      gradientBackground: "#733AEA",
      dash: [0, 0],
      data: [2100, 2100, 2100, 2100, 2100, 1800, 1800, 1800, 1800, 1800, 2700, 2700, 2700, 2700, 2400, 2400, 2400, 2400, 3000, 3000, 3000, 3000, 3400, 3400, 3400, 3400, 3400, 3400, 3800, 3800, 3800, 3800]
    }]
  };
  var webConvRate = {
    labels: ["01 تا 15 فروردین", "16 تا 31 فروردین", "01 تا 14 اردیبهشت", "15 تا 28 اردیبهشت", "01 تا 15 خرداد", "16 تا 31 خرداد", "01 تا 15 تیر", "16 تا 30 تیر", "01 تا 15 مرداد", "16 تا 30 مرداد", "01 تا 15 شهریور", "16 تا 31 شهریور"],
    dataUnit: 'هدایت',
    lineTension: .4,
    step: 10,
    datasets: [{
      label: "نرخ تبدیل",
      color: "#F2426E",
      gradientBackground: "#F2426E",
      dash: [0, 0],
      data: [20, 28, 25, 19, 24, 31, 42, 33, 35, 62, 54, 53]
    }]
  };
  function campaignLineS3(selector, set_data) {
    var $selector = selector ? $(selector) : $('.campaign-line-chart-s3');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      function getGradient(color) {
        var gradient = selectCanvas.createLinearGradient(0, 0, 0, selectCanvas.canvas.clientHeight);
        gradient.addColorStop(0, "".concat(NioApp.hexRGB(color, 0)));
        gradient.addColorStop(0.5, "".concat(NioApp.hexRGB(color, .25)));
        gradient.addColorStop(1, "".concat(NioApp.hexRGB(color, .1)));
        return gradient;
      }
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          label: _get_data.datasets[i].label,
          tension: _get_data.lineTension,
          backgroundColor: _get_data.datasets[i].gradientBackground ? getGradient(_get_data.datasets[i].gradientBackground) : _get_data.datasets[i].background,
          fill: true,
          borderWidth: 2,
          borderDash: _get_data.datasets[i].dash,
          borderColor: _get_data.datasets[i].color,
          pointBorderColor: 'transparent',
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: _get_data.datasets[i].color,
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 4,
          data: _get_data.datasets[i].data
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'line',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          plugins: {
            legend: {
              display: _get_data.legend ? _get_data.legend : false,
              rtl: NioApp.State.isRTL,
              labels: {
                boxWidth: 12,
                padding: 20,
                color: '#6783b8'
              }
            },
            tooltip: {
              enabled: true,
              rtl: NioApp.State.isRTL,
              callbacks: {
                label: function label(context) {
                  return "".concat(context.parsed.y, " ").concat(_get_data.dataUnit);
                }
              },
              backgroundColor: '#fff',
              borderColor: '#eff6ff',
              borderWidth: 2,
              titleFont: {
                size: 13
              },
              titleColor: '#6783b8',
              titleMarginBottom: 6,
              bodyColor: '#9eaecf',
              bodyFont: {
                size: 12
              },
              bodySpacing: 4,
              padding: 10,
              footerMarginTop: 0,
              displayColors: false
            }
          },
          maintainAspectRatio: false,
          scales: {
            y: {
              display: true,
              position: NioApp.State.isRTL ? "right" : "left",
              ticks: {
                beginAtZero: _get_data.zero ? _get_data.zero : true,
                font: {
                  size: 12
                },
                color: '#9eaecf',
                padding: 8,
                stepSize: _get_data.step ? _get_data.step : 100,
                border: {
                  dash: [5, 5]
                }
              },
              grid: {
                color: NioApp.hexRGB("#526484", .1),
                tickLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .1),
                border: {
                  dash: [5, 5]
                },
                drawTicks: false
              }
            },
            x: {
              display: false,
              ticks: {
                font: {
                  size: 12
                },
                color: '#9eaecf',
                source: 'auto',
                padding: 0,
                reverse: NioApp.State.isRTL,
                border: {
                  dash: [5, 5]
                }
              },
              grid: {
                color: "transparent",
                tickLength: 0,
                zeroLineColor: 'transparent',
                offset: true,
                border: {
                  dash: [5, 5]
                },
                drawTicks: false
              }
            }
          }
        }
      });
    });
  }
  // init chart
  NioApp.coms.docReady.push(function () {
    campaignLineS3();
  });
  var avgRating = {
    labels: ["01 فروردین", "02 فروردین", "03 فروردین", "04 فروردین", "05 فروردین", "06 فروردین", "07 فروردین", "08 فروردین", "09 فروردین", "10 فروردین", "11 فروردین", "12 فروردین", "13 فروردین", "14 فروردین", "15 فروردین"],
    dataUnit: 'تومان',
    stacked: true,
    datasets: [{
      label: "کاربر فعال",
      color: [NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2), NioApp.hexRGB("#fff", .2)],
      data: [8200, 7800, 9500, 5500, 9200, 9690, 8200, 7800, 9500, 5500, 9200, 9690, 6032, 9200, 9690, 8200]
    }]
  };
  function campaignBarChartS1(selector, set_data) {
    var $selector = selector ? $(selector) : $('.campaign-bar-chart-s1');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data,
        _d_legend = typeof _get_data.legend === 'undefined' ? false : _get_data.legend;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          label: _get_data.datasets[i].label,
          data: _get_data.datasets[i].data,
          // Styles
          backgroundColor: _get_data.datasets[i].color,
          borderWidth: 2,
          borderColor: 'transparent',
          hoverBorderColor: 'transparent',
          borderSkipped: 'bottom',
          barPercentage: .8,
          categoryPercentage: .8
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'bar',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          plugins: {
            legend: {
              display: _get_data.legend ? _get_data.legend : false,
              rtl: NioApp.State.isRTL,
              labels: {
                boxWidth: 30,
                padding: 20,
                color: '#6783b8'
              }
            },
            tooltip: {
              enabled: true,
              rtl: NioApp.State.isRTL,
              callbacks: {
                label: function label(context) {
                  return "".concat(context.parsed.y, " ").concat(_get_data.dataUnit);
                }
              },
              backgroundColor: '#1c2b46',
              titleFont: {
                size: 10
              },
              titleColor: '#fff',
              titleMarginBottom: 4,
              bodyColor: '#fff',
              bodyFont: {
                size: 10
              },
              bodySpacing: 4,
              padding: 6,
              footerMarginTop: 0,
              displayColors: false
            }
          },
          maintainAspectRatio: false,
          scales: {
            y: {
              display: false,
              stacked: _get_data.stacked ? _get_data.stacked : false,
              ticks: {
                beginAtZero: true
              }
            },
            x: {
              display: false,
              stacked: _get_data.stacked ? _get_data.stacked : false,
              ticks: {
                reverse: NioApp.State.isRTL
              }
            }
          }
        }
      });
    });
  }
  // init chart
  NioApp.coms.docReady.push(function () {
    campaignBarChartS1();
  });
}(NioApp, jQuery);