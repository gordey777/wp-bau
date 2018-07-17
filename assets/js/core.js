var touchScreen = ('ontouchstart' in document || navigator.msMaxTouchPoints) ? true : false;
var retinaDisplay = (window.devicePixelRatio > 1) ? true : false;
var browserStorage = ('localStorage' in window) ? true : false;
var standaloneApp = (('standalone' in window.navigator) && window.navigator.standalone) ? true : false;
var loader, loaderIndex, busy = false,
  proData = null,
  mouseX, mouseY, windowLoad = 0;
var photoSwipeOpts = { captionAndToolbarAutoHideDelay: 0, captionAndToolbarShowEmptyCaptions: false, captionAndToolbarOpacity: 1, backButtonHideEnabled: false, captionAndToolbarFlipPosition: true, imageScaleMethod: 'fitNoUpscale', allowUserZoom: false };

$(document).ready(function() {
  if (touchScreen) { $('body').removeClass('cursor') }
  if ($("a[rel^='zoom']").length) { $("a[rel^='zoom']").photoSwipe(photoSwipeOpts) }
  fitBG();
  initMap();
  initHints();
  initProjects();
  initTouch();
  $('.loader').showLoader();
  if ($('.news-marquee').length) { $('.news-marquee').marquee({ duration: 20000, gap: 0, delayBeforeStart: 0, direction: 'left', pauseOnHover: true, duplicated: true }) }
});

$(window).load(function() {
  if ($('.projects-line').length) { $('.projects-line').each(function() { $(this).scrollContent() }) }
  if ($('#main-page').length) { initCycle() }
  fitBG();
  $('.container').css({ visibility: 'visible' });
  setTimeout(function() {
    $('.loader').addClass('hide');
    setTimeout(function() {
      $('.loader').hideLoader();
      $('.loader').remove();
    }, 300);
    if ($('.project-cycle a').length) { $('.project-cycle').cycle('resume') }
    windowLoad = 1;
  }, 300);
});

$(window).scroll(function() {
  if ($(window).scrollTop() >= 40) { $('.header').addClass('black') } else { $('.header').removeClass('black') }
});

$(window).resize(function() {
  if ($('.projects-line').length) { $('.projects-line').each(function() { $(this).checkScroll() }) }
  fitBG();
});

$(document).mousemove(function(e) {
  if (!touchScreen && $('#map-hint').length) {
    var left = e.pageX;
    if ($(window).width() < $('#map-hint').outerWidth() + left) { left = left - $('#map-hint').outerWidth() }
    $('#map-hint').css({ top: e.pageY, left: left });
  }
});

$(window).on('hashchange', function() {
  if (busy) { return }
  var url = window.location.href.replace(/\/#/i, '');
  if (url.match(/\/projects\/$/) && $('#projects-main').length) {
    busy = true;
    $('html').removeClass('overflow');
    $('.project-body').addClass('hide');
    setTimeout(function() {
      $('#projects-main').css({ visibility: 'visible' }).removeClass('hide');
      $('.project-cycle').cycle('destroy');
      $('.project-body').hide();
      fitBG();
      if ($('.pro-cycle').length) { $('.pro-cycle').cycle('resume') }
      $('.project-body').removeClass('anim');
      busy = false;
    }, 1000);
  } else if (url.match(/\/projects\//)) {
    $('.project-body').addClass('hide').show();
    $('#projects-main').addClass('hide');
    $('.hint').remove();
    fitBG();
    loadProject(url, function() {
      if ($('.pro-cycle').length) { $('.pro-cycle').cycle('pause') }
      $('#projects-main').css({ visibility: 'hidden' });
    });
  }
});

/* TOUCH */

function initTouch() {
  if (!touchScreen) { return }
  $('.main-menu, .header, .wrapper, .footer, .pattern').on('click', function(event) {
    if ($('.hint').length && !$(event.target).parents('.hint').length && !$(event.target).hasClass('project-image') &&
      !$(event.target).hasClass('project-link')) { $('.hint').remove() }
  });
  $('.news-marquee a').on('click', function(event) { event.preventDefault() });
  $('.menu li ul').each(function() {
    $(this).parent('li').find('>a').on('click', function(event) {
      if ($(window).width() > 1000) { event.preventDefault() }
    });
  });
  $('.submenu a, .menu a, .footer a, .content a, .langs a, .line a, .logo a, .e-submit, .news-marquee a').tapHighlight();
}

/* HINT */

function initHints() {
  $('.project-image, .news-marquee a, .project-link').on('mouseenter', function(e) {
    if ($('.hint').length) { $('.hint').remove() }
    var p = $(this).offset(),
      html = '',
      work = '',
      ow = $(this).width(),
      tleft;
    html += $(this).attr('alt') ? '<h3>' + $(this).attr('alt') + '</h3>' : '';
    html += $(this).data('title') ? '<h3>' + $(this).data('title') + '</h3>' : '';
    //html += $(this).data('image') ? '<div class="image"><img src="/pub/projects/' + $(this).data('image') + '1.jpg" /></div>' : '';
    html += $(this).data('photo') ? '<div class="image"><img src="' + $(this).data('photo') + '" /></div>' : '';
    work += $(this).data('works') ? '<b>' + projectWorks + ':</b> <span>' + $(this).data('works') + '</span><br />' : '';
    work += $(this).data('scope') ? '<b>' + projectScope + ':</b> <span>' + $(this).data('scope') + ' ' + projectM + '²</span><br />' : '';
    work += $(this).data('start') ? '<b>' + projectDate + ':</b> <span>' + projectFrom + ' ' + $(this).data('start') + ' ' + projectTo + ' ' + ($(this).data('end') ? $(this).data('end') : projectNow) + '</span><br />' : '';
    work += $(this).data('city') ? '<b>' + projectCity + ':</b> <span>' + $(this).data('city') + '</span><br />' : '';
    if (work) { work = '<div>' + work + '</div>' }
    if (touchScreen) { work += '<a href="' + ($(this).attr('href') || $(this).parent('a').attr('href')) + '" class="more">' + projectMore + '</a>' }
    $('body').append('<div class="hint">' + html + work + '<i></i></div>');
    if (touchScreen && $(this).data('photo')) { $('.hint .more').addClass('small') }
    $('.more').tapHighlight();
    $('.hint img').load(function() { $(this).show() });
    var w = $('.hint').outerWidth(),
      h = $('.hint').outerHeight();
    var left = p.left - (((w - ow) / 2) - 5),
      top = p.top - h - 23;
    if (left < 20) {
      left = p.left;
      tleft = (ow / 2) + 5;
      if (left < 20) { left = 20;
        tleft = 20 }
    }
    if ((left + w + 20) > $(window).width()) {
      left = p.left - w + ow + 10;
      tleft = (w - ow) + (ow / 2) - 5;
      if ((left + w + 20) > $(window).width()) { left = $(window).width() - w - 20;
        tleft = w - 20 }
      if (left < 20) { left = 20;
        tleft = p.left + ((ow / 2) - 15) }
    }
    $('.hint').css({ top: top, left: left })
    $('.hint i').css({ left: tleft });
    if ($(this).data('photo') || $(this).hasClass('project-link')) {
      left = e.pageX - (w / 2);
      tleft = '50%';
      if (left < 20) {
        left = 20;
        tleft = e.pageX - left;
        if (tleft < 20) { tleft = 20 }
      }
      if ((left + w + 20) > $(window).width()) {
        left = $(window).width() - w - 20;
        tleft = e.pageX - left;
        if (tleft > w - 20) { tleft = w - 20 }
      }
      $('.hint').css({ left: left });
      $('.hint i').css({ left: tleft });
    }
    $('.hint').addClass('show');
  }).on('mouseleave', function(event) {
    if ($('.hint').length && !touchScreen) { $('.hint').remove() }
  });
}

/* CYCLE */

function initCycle() {
  $('.cycle-slideshow').on('cycle-after', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
    var a = $('.citation .active'),
      t = $(incomingSlideEl).attr('title');
    if (a.next().length) { a.next().addClass('active') } else { $('.citation div:first-child').addClass('active') }
    a.removeClass('active');
    $('.cycle-caption').html(t ? '<h3>' + t + '</h3><p>' + $(incomingSlideEl).attr('alt') + '</p>' : '');
  });
}

/* BG */

function fitBG() {
  $('.cycle-slideshow').imagefit({ mode: 'outside', force: true, halign: 'center', valign: 'top' });
  if ($(window).height() > ($('.container').outerHeight() + (($(window).width() > 1000) ? 140 : 60) + $('.footer').height())) { $('.footer').addClass('fixed') } else { $('.footer').removeClass('fixed') }
  if ($(window).width() > 1440) { $('.sidebar').css({ right: (($(window).width() - 1440) / 2) + 40 }) } else { $('.sidebar').css({ right: 40 }) }
  $('.content .e-video').css({ height: ($('.content .e-video').width() / $('.content .e-video').data('ratio')) + 10 });
  if ($(window).width() < 1000) { $('.project-body .project-cycle, .project-body .youtube').css({ height: $('.project-body .project-cycle').width() / 1.5 }) } else { $('.project-body .project-cycle, .project-body .youtube').css({ height: '' }) }
}

/* MAPS */

function initMap() {
  if (typeof google !== 'object' || typeof google.maps !== 'object') { return }
  var mapStyles = [{ featureType: 'all', elementType: 'geometry', stylers: [{ color: '#222222' }] }, { featureType: 'all', elementType: 'labels.text.fill', stylers: [{ color: '#aaaaaa' }] }, { featureType: 'all', elementType: 'labels.text.stroke', stylers: [{ visibility: 'off' }] }, { featureType: 'administrative.country', elementType: 'geometry.stroke', stylers: [{ color: '#ffcc00' }, { weight: '1.5' }] }, { featureType: 'administrative.province', elementType: 'all', stylers: [{ color: '#777777' }, { weight: '0.75' }] }, { featureType: 'administrative.province', elementType: 'labels.text', stylers: [{ visibility: 'off' }] }, { featureType: 'administrative.locality', elementType: 'labels.icon', stylers: [{ color: '#777777' }] }, { featureType: 'administrative.neighborhood', elementType: 'labels.text', stylers: [{ visibility: 'off' }] }, { featureType: 'administrative.land_parcel', elementType: 'all', stylers: [{ visibility: 'off' }] }, { featureType: 'landscape.man_made', elementType: 'geometry', stylers: [{ color: '#333333' }] }, { featureType: 'poi', elementType: 'all', stylers: [{ visibility: 'off' }] }, { featureType: 'road', elementType: 'geometry', stylers: [{ color: '#444444' }] }, { featureType: 'road', elementType: 'geometry.stroke', stylers: [{ visibility: 'on' }, { weight: '0.5' }] }, { featureType: 'road', elementType: 'labels.icon', stylers: [{ visibility: 'off' }] }, { featureType: 'road.highway', elementType: 'geometry', stylers: [{ color: '#555555' }] }, { featureType: 'road.highway', elementType: 'geometry.stroke', stylers: [{ visibility: 'on' }, { weight: '0.1' }] }, { featureType: 'road.highway.controlled_access', elementType: 'geometry', stylers: [{ saturation: '-40' }] }, { featureType: 'road.arterial', elementType: 'geometry', stylers: [{ color: '#555555' }] }, { featureType: 'transit', elementType: 'all', stylers: [{ visibility: 'off' }] }, { featureType: 'water', elementType: 'all', stylers: [{ color: '#494e52' }] }];
  if ($('#office-map').length) {
    var img = (retinaDisplay) ? 'marker-2x' : 'marker';
    var ico = { url: '/wp-content/themes/wp-bau/img/' + img + '.png', scaledSize: new google.maps.Size(56, 56) };
    var officePos = new google.maps.LatLng(50.455169, 30.640285);
    var officeMap = new google.maps.Map(document.getElementById('office-map'), { styles: mapStyles, zoom: 14, center: officePos, mapTypeId: google.maps.MapTypeId.ROADMAP, disableDefaultUI: true });
    var officeMarker = new google.maps.Marker({ position: officePos, map: officeMap, icon: ico, optimized: false });
    initMapZoom(officeMap, google.maps.ControlPosition.RIGHT_TOP);
  }
  if ($('#projects-map').length) {
    var projectsPos = new google.maps.LatLng(49.176162, 31.294052),
      zoom = 7;
    if ($(window).width() < 600) { projectsPos = new google.maps.LatLng(50.450305, 30.523775);
      zoom = 8 }
    var projectsMap = new google.maps.Map(document.getElementById('projects-map'), { styles: mapStyles, zoom: zoom, center: projectsPos, mapTypeId: google.maps.MapTypeId.ROADMAP, disableDefaultUI: true });
    initMapZoom(projectsMap, google.maps.ControlPosition.LEFT_TOP);
    loadMarkers(projectsMap);
    $('.container').on('click', '#project-details i', function() {
      if ($('.pro-cycle').length) { $('.pro-cycle').cycle('destroy') }
      $('#project-details').remove();
    });
  }
}

function initMapZoom(map, pos) {
  var zoomDiv = document.createElement('div');
  zoomDiv.className = 'zoom';
  var zoomInDiv = document.createElement('div');
  zoomInDiv.className = 'in';
  zoomDiv.appendChild(zoomInDiv);
  var zoomSprDiv = document.createElement('div');
  zoomSprDiv.className = 'separator';
  zoomDiv.appendChild(zoomSprDiv);
  var zoomOutDiv = document.createElement('div');
  zoomOutDiv.className = 'out';
  zoomDiv.appendChild(zoomOutDiv);
  map.controls[pos].push(zoomDiv);
  google.maps.event.addDomListener(zoomInDiv, 'click', function() {
    map.setZoom(map.getZoom() + 1);
  });
  google.maps.event.addDomListener(zoomOutDiv, 'click', function() {
    map.setZoom(map.getZoom() - 1);
  });
}

function loadMarkers(map) {
  var list = '',
    needs = '',
    n = [],
    z = [];
  for (var i = 0; i < proData.length; i++) {
    var pos = new google.maps.LatLng(proData[i][0], proData[i][1]);
    var s = proData[i][2],
      d = proData[i][4];
    var size = s == 1 ? '-big' : '-small';
    var dir = d == 1 ? '-left' : '-right';
    var sw = s == 1 ? 22 : 10,
      sh = s == 1 ? 30 : 16;
    var ax = s == 1 ? (d == 1 ? 19 : 1) : (d == 1 ? 8 : 1),
      ay = s == 1 ? 29 : 15;
    var x2 = retinaDisplay ? '-2x' : '';
    var ico = { url: '/wp-content/themes/wp-bau/img/flag' + size + dir + x2 + '.png', scaledSize: new google.maps.Size(sw, sh), anchor: new google.maps.Point(ax, ay) };
    var marker = new google.maps.Marker({ position: pos, map: map, zIndex: 10, icon: ico, optimized: false });
    eval('google.maps.event.addListener(marker, "click", function(event) {showProjectInfo(' + i + ')})');
    eval('google.maps.event.addListener(marker, "mouseover", function(event) {showMapHint(' + i + ')})');
    google.maps.event.addListener(marker, 'mouseout', function(event) { $('#map-hint').hide() });
    proData[i].push(marker);
  }
}

function showMapHint(i) {
  $('#map-hint').html(proData[i][5]).show();
}

function showProjectInfo(i) {
  var html = '',
    work = '',
    images = '';
  if ($('.pro-cycle').length) { $('.pro-cycle').cycle('destroy') }
  $('#project-details').remove();
  var url = window.location.href;
  var lang = (url.match(/\/(en|uk|ru)\//)) ? url.match(/(\/(en|uk|ru))/)[0] : '';
  if ($(window).width() < 600) {
    $('#map-hint').hide();
    var addr = lang + '/projects/' + proData[i][12] + '/';
    $('.project-body').addClass('hide').show();
    $('#projects-main').addClass('hide');
    $('.hint').remove();
    fitBG();
    loadProject(addr, function() {
      if ($('.pro-cycle').length) { $('.pro-cycle').cycle('pause') }
      $('#projects-main').css({ visibility: 'hidden' });
    });
    window.location = addr.replace(/\/projects\//i, '/projects/#/');
    return;
  }
  $('#projects-main').append('<div id="project-details"></div>');
  html += proData[i][5] ? '<h3>' + proData[i][5] + '</h3>' : '';
  if (proData[i][13]) {
    var a = proData[i][13].split(',');
    var fullimg = proData[i][14].split(',');
    for (var s = 0; s < a.length; s++) { images += '<a href="' + fullimg[s] + '"><img src="' + a[s] + '" alt="' + proData[i][5].replace(/"/g, '&quot;') + '" /></a>' }
    html += '<div class="pro-cycle"><span class="cycle-pager"></span>' + images + '</div>';
  }
  work += proData[i][8] ? '<b>' + projectWorks + ':</b> <span>' + proData[i][8] + '</span><br />' : '';
  work += proData[i][9] ? '<b>' + projectScope + ':</b> <span>' + proData[i][9] + ' ' + projectM + '²</span><br />' : '';
  work += proData[i][6] ? '<b>' + projectDate + ':</b> <span>' + projectFrom + ' ' + proData[i][6] + ' ' + projectTo + ' ' + (proData[i][7] ? proData[i][7] : projectNow) + '</span><br />' : '';
  //    work += proData[i][10] ? '<b>' + projectCity + ':</b> <span>' + proData[i][10] + '</span><br />' : '';
  work += proData[i][11] ? '<b>' + projectClient + ':</b> <span>' + proData[i][11] + '</span><br />' : '';
  if (work) { work = '<div class="details">' + work + '</div>' } html += work;
  html += '<a href="' + lang + '/projects/' + proData[i][12] + '/" class="more">' + projectMore + '</a>';
  $('#project-details').html(html + '<i></i>');
  $('.more').tapHighlight();
  $('.pro-cycle').cycle({ slides: '> a', pauseOnHover: true });
  if ($('.pro-cycle a').length) { $('.pro-cycle a').photoSwipe(photoSwipeOpts) }
}

/* PROJECTS */

function initProjects() {
  initProjectsSlideshow();
  $('.content').on('click', '.steps-wrap h3', function() {
    $('.project-body').toggleClass('close-steps');
    if ($('.projects-line.steps .scroll').html().match(/<\!--/)) {
      $('.projects-line.steps .scroll').html($('.projects-line.steps .scroll').html().replace(/(<\!--|-->)/gi, ''));
      if ($('.projects-line.steps a').length) { $('.projects-line.steps a').photoSwipe(photoSwipeOpts) }
    }
    if ($('.project-body .projects-line').length) { $('.project-body .projects-line').checkScroll() }
    fitBG();
  });
  if (window.location.href.match(/\/projects\/#\/([a-z0-9-\/]+)$/)) {
    $('.project-body').show();
    fitBG();
    loadProject(window.location.href.replace(/\/#/i, ''));
    $('#projects-main').addClass('hide').css({ visibility: 'hidden' });
    fitBG();
  }
  $('body').on('click', '.media-btn', function(event) {
    $('.project-cycle-wrap').toggleClass('video');
  });
  $('.menu a[href$="/projects/"]').on('click', function(event) {
    if (busy) { event.preventDefault(); return false }
    if ($('#projects-main').length && $('.project-body').length) {
      event.preventDefault();
      busy = true;
      $('html').removeClass('overflow');
      $('.project-body').addClass('hide');
      var url = $(this).attr('href');
      setTimeout(function() {
        $('#projects-main').css({ visibility: 'visible' }).removeClass('hide');
        $('.project-cycle').cycle('destroy');
        $('.project-body').hide();
        fitBG();
        if ($('.pro-cycle').length) { $('.pro-cycle').cycle('resume') }
        $('.project-body').removeClass('anim');
        busy = false;
      }, 1000);
      window.location = url.replace(/\/projects\//i, '/projects/#/');
      return false;
    }
  });
  $('body').on('click', 'a', function(event) {
    if (busy) { event.preventDefault(); return false }
    var url = $(this).attr('href');
    if (url.match(/\/projects\//) /*&& !url.match(/\/uploads\//)*/) {
      event.preventDefault();
      if (touchScreen && ($(this).hasClass('project-link') || $(this).find('img').hasClass('project-image'))) { return false }
      $('.project-body').addClass('hide').show();
      $('#projects-main').addClass('hide');
      $('.hint').remove();
      fitBG();
      loadProject(url, function() {
        if ($('.pro-cycle').length) { $('.pro-cycle').cycle('pause') }
        $('#projects-main').css({ visibility: 'hidden' });
      }, $(this).attr('class'));
      window.location = url.replace(/\/projects\//i, '/projects/#/');
      return false;
    }
  });
  $('body').on('click', '.project-nav .top', function(event) {
    if (busy) { event.preventDefault(); return false }
    if ($('#projects-main').length && $('.project-body').length) {
      event.preventDefault();
      busy = true;
      $('html').removeClass('overflow');
      $('.project-body').addClass('hide');
      var url = $(this).attr('href');
      setTimeout(function() {
        $('#projects-main').css({ visibility: 'visible' }).removeClass('hide');
        $('.project-cycle').cycle('destroy');
        $('.project-body').hide();
        fitBG();
        if ($('.pro-cycle').length) { $('.pro-cycle').cycle('resume') }
        $('.project-body').removeClass('anim');
        busy = false;
      }, 1000);
      window.location = url.replace(/\/projects\//i, '/projects/#/');
      return false;
    }
  });
/*  $('body').on('click', '.top', function(event) {
    window.location = window.location.href.replace(/\/#\/[a-zA-Z-\/]+$/i, '/#/');
  });*/
}



function loadProject(url, after, direction) {
  if (busy) return;
  busy = true;
  var x = 0,
    y = 0;
  if (direction == 'next') { x = $(window).width();
    $('html').addClass('overflow') }
  if (direction == 'prev') { x = -$(window).width();
    $('html').addClass('overflow') }
  $('.project-body').addClass('anim').move3d(-x, -y);
  setTimeout(function() {
    $('.project-body').removeClass('anim').move3d(x, y);
    $('.loader').hideLoader();
    $('.container').showLoader();
    fitBG();
    var qs = url.match(/\?/) ? '&' : '?';
    var data = {
      action: 'ajaxgetpost',
      //postid: postid,
      posturl: url,
    };

    $.ajax({
      url: adminAjax['ajaxurl'],
      data: data,
      type: 'POST',
    //$.ajax({
      //url: url + qs + 'ajax=on',
      //cache: true,

      success: function(html) {
        $('.project-cycle').cycle('destroy');
        $('.project-body').html(html).removeClass('hide');
        fitBG();
        initProjectsSlideshow();
        if ($('.project-cycle a').length && windowLoad) { $('.project-cycle').cycle('resume') }
        $('.project-body .scroll-left, .project-body .scroll-right').unbind('touchstart mouseover').off('touchend mouseout');
        if ($('.project-body .projects-line').length) { $('.project-body .projects-line').scrollContent() }
        $('.container').hideLoader();
        $('body, html').scrollTop(0);
        $('.project-nav .prev, .project-nav .next, .project-nav .top').tapHighlight();
        if (after) { after() }
        $('.project-body').addClass('anim').move3d(0, 0);
        setTimeout(function() {
          $('.project-body').removeClass('anim');
        if($('.project-body').find('.steps-wrap').length){
          $('.project-body').addClass('close-steps');
        } else {
          $('.project-body').addClass('no-steps');
        }
          fitBG();
          busy = false }, 1000);
      }
    });
  }, 1000);
}

function initProjectsSlideshow() {
  if ($('.project-cycle a').length) {
    $('.project-cycle').cycle({ slides: '> a', pagerTemplate: "<span><img src='{{firstChild.src}}'></span>", pager: '.project-cycle-pager', pauseOnHover: true });
    $('.project-cycle').cycle('pause');
    $('.project-cycle').on('cycle-after', function() {
      var p = $('.project-cycle-pager-scroll .cycle-pager-active').position(),
        s = $('.project-cycle-pager-scroll').scrollTop();
      if ((p.top > s + 330) || (p.top < s)) { $('.project-cycle-pager-scroll').stop().animate({ scrollTop: p.top }, 500) }
    });
    $('.project-cycle a').photoSwipe(photoSwipeOpts);
  }
  if ($('.projects-line.steps a').length) { $('.projects-line.steps a').photoSwipe(photoSwipeOpts) }
}

/* LOADER */

jQuery.fn.showLoader = function(s) {
  var c = s ? ' class="' + s + '"' : '';
  $(this).append('<div id="loader"' + c + '></div>');
  var left = (retinaDisplay) ? 0 : 64,
    width = (c.match(/small/)) ? 16 : 32;
  if (c.match(/small/)) { left = (retinaDisplay) ? 32 : 96 }
  $('#loader').css({ backgroundPosition: '-' + left + 'px -' + width + 'px' });
  loaderIndex = 2;
  loader = setInterval(function() {
    $('#loader').css({ backgroundPosition: '-' + left + 'px -' + (loaderIndex * width) + 'px' });
    loaderIndex = (loaderIndex + 1) % 12;
  }, 60);
};

jQuery.fn.hideLoader = function() {
  if (!$(this).find('#loader').length) { return }
  $(this).find('#loader').remove();
  clearInterval(loader);
  loaderIndex = 1;
  loader = 0;
};

/* SCROLL */

jQuery.fn.scrollContent = function() {
  var left, right, scroll, obj = this;
  var scrollBar = $(this).find('.scroll');
  var scrollLeft = $(this).find('.scroll-left');
  var scrollRight = $(this).find('.scroll-right');
  $(this).checkScroll();
  scrollBar.scroll(function() { $(obj).checkScroll() });
  scrollLeft.bind('touchstart mouseover', function(event) {
    if (touchScreen && event.type == 'mouseover') { return }
    event.preventDefault();
    left = setInterval(function() {
      if ((scrollBar.scrollLeft() - 3) <= 0) {
        scrollLeft.css({ display: 'none' });
        scroll = 0;
      } else {
        scrollRight.css({ display: 'block' });
        scroll = scrollBar.scrollLeft() - 3;
      }
      scrollBar.scrollLeft(scroll);
    }, 10);
  }).on('touchend mouseout', function() { clearInterval(left) });
  scrollRight.bind('touchstart mouseover', function(event) {
    if (touchScreen && event.type == 'mouseover') { return }
    event.preventDefault();
    right = setInterval(function() {
      var scrollWidth = 0;
      $(obj).find('a').each(function() { scrollWidth += $(this).width() + 20 });
      var w = scrollWidth - scrollBar.width();
      if ((scrollBar.scrollLeft() + 3) >= w) {
        scrollRight.css({ display: 'none' });
        scroll = w;
      } else {
        scrollLeft.css({ display: 'block' });
        scroll = scrollBar.scrollLeft() + 3;
      }
      scrollBar.scrollLeft(scroll);
    }, 10);
  }).on('touchend mouseout', function() { clearInterval(right) });
};

jQuery.fn.checkScroll = function() {
  var scrollBar = $(this).find('.scroll');
  var scrollLeft = $(this).find('.scroll-left');
  var scrollRight = $(this).find('.scroll-right');
  var scrollWidth = 0;
  $(this).find('a').each(function() { scrollWidth += $(this).width() + 20 });
  if ($('.hint').length) { $('.hint').remove() }
  if (scrollWidth > scrollBar.width()) {
    var w = scrollWidth - scrollBar.width();
    if (scrollBar.scrollLeft() == 0) {
      scrollLeft.css({ display: 'none' });
      scrollRight.css({ display: 'block' });
    } else if (scrollBar.scrollLeft() >= w) {
      scrollLeft.css({ display: 'block' });
      scrollRight.css({ display: 'none' });
    } else {
      scrollLeft.css({ display: 'block' });
      scrollRight.css({ display: 'block' });
    }
  } else {
    scrollLeft.css({ display: 'none' });
    scrollRight.css({ display: 'none' });
  }
};

/* CAREER */

function check_career_form() {
  var i, o = new Array('form_name', 'form_phone', 'form_specialty', 'form_message'),
    email = document.getElementById('form_email');
  for (i = 0; i < o.length; i++) {
    var e = document.getElementById(o[i]);
    if (e.value == '') { alert(careerAlert);
      e.focus(); return false }
  }
  if (!email.value.match(/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/)) {
    alert(careerEmailAlert);
    email.focus();
    return false;
  }
  return true;
}

/* TAPHIGHLIGHT */

jQuery.fn.tapHighlight = function() {
  if (touchScreen) {
    $(this).on('touchstart', function(event) {
      $(this).addClass('tap');
    }).on('touchend', function() {
      $(this).removeClass('tap');
    });
  }
};

/* 3D */

var support3d = function() {
  var t = 'transform:translate3d(0px, 0px, 0px)',
    s, e = document.createElement('div');
  e.style.cssText = '-webkit-' + t + '; -moz-' + t + '; -ms-' + t + '; -o-' + t + '; ' + t;
  s = e.style.cssText.match(/translate3d\(0px, 0px, 0px\)/g);
  return (s !== null && s.length === 1);
};

jQuery.fn.move3d = function(x, y) {
  var t = 'translate',
    z = '';
  y = y || 0;
  if (support3d) { t = 'translate3d';
    z = ', 0px' }
  $(this).css({
    '-webkit-transform': t + '(' + x + 'px, ' + y + 'px' + z + ')',
    '-moz-transform': t + '(' + x + 'px, ' + y + 'px' + z + ')',
    '-ms-transform': t + '(' + x + 'px, ' + y + 'px' + z + ')',
    '-o-transform': t + '(' + x + 'px, ' + y + 'px' + z + ')',
    'transform': t + '(' + x + 'px, ' + y + 'px' + z + ')'
  });
  return $(this);
};
