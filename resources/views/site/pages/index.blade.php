@extends('site.layouts.app')

@section('title', 'Главная')

@section('styles')
<style>

.slider {
    display: flex;
    /* perspective: 1000px; */
    transform-style: preserve-3d;
}
/*
.slider::before {
    background-image: var(--img-prev);
}
.slider::after {
    transition: opacity 0.7s;
    opacity: 0;
    background-image: var(--img-next);
}
.slider--bg-next::after {
  opacity: 1;
}
*/
.slider__content {
    margin: auto;
    width: 100%;
    height: 34rem;
    will-change: transform;
    transform-style: preserve-3d;
    transform: translateZ(var(--z-distance));
}
.slider__images {
    overflow: hidden;
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 0;
    box-shadow: 0 0 0.1em rgb(var(--taupe));
}
.slider__images-item {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    will-change: transform;
    transition-timing-function: ease-in;
    visibility: hidden;
}
.slider__images-item img {
    display: block;
    position: relative;
    width: 100%;
    height: 100%;
    object-fit: cover;
    will-change: transform;
}
.slider__images-item--active {
    z-index: 20;
    visibility: visible;
}
.slider__images-item--subactive {
    z-index: 15;
    visibility: visible;
}
.slider__images-item--next {
    transform: translateX(100%);
}
.slider__images-item--prev {
  transform: translateX(-100%);
}
.slider__images-item--transit {
  transition: transform 0.7s, opacity 0.7s;
}
.slider__text {
    position: relative;
    height: 100%;
}
.slider__text-item {
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 0.5em;
    perspective: 1000px;
    transform-style: preserve-3d;
}
.slider__text-item > * {
    overflow: hidden;
    position: absolute;
}
.slider__text-item h3,
.slider__text-item p {
    transition: transform 0.35s ease-out;
    line-height: 1.5;
    overflow: hidden;
}
.slider__text-item h3 {
    border-width: 1px;
    border-color: rgb(var(--gray));
    background-color: rgba(255, 255, 255, 0.8);
}
.slider__text-item p {
  font-family: "Open Sans", sans-serif;
  padding: 1em;
  color: white;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.8);
}
.slider__text-item h3::before,
.slider__text-item p::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 105%;
  height: 100%;
  transform: translateX(0);
  transition: transform 0.35s ease-out 0.28s;
}
.slider__text-item h3::before {
  background-color: #000;
}
.slider__text-item p::before {
  background-color: #fff;
}
.slider__text-item h3 {
  margin: 0;
  font-size: 3.5em;
  padding: 0 0.3em;
  position: relative;
  font-weight: 700;
  transform: translateX(-100%);
}
.slider__text-item p {
  margin: 0;
  transform: translateX(100%);
}
.slider__text-item-head {
  top: -0.5em;
  transform: translateZ(3em);
}
.slider__text-item-info {
  bottom: 0;
  right: 0;
  max-width: 75%;
  min-width: min-content;
  transform: translateZ(2em);
}
.slider__text-item--active h3,
.slider__text-item--active p {
  transform: translateX(0);
}
.slider__text-item--active h3::before {
  transform: translateX(102%);
}
.slider__text-item--active p::before {
  transform: translateX(-102%);
}
.slider__text-item--backwards h3::before,
.slider__text-item--backwards p::before {
  transition: transform 0.35s ease-in;
}
.slider__text-item--backwards h3,
.slider__text-item--backwards p {
  transition: transform 0.35s ease-in 0.35s;
}
.slider__nav {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  text-align: center;
}
.slider__nav-arrows {
  display: flex;
  justify-content: space-between;
  width: 100%;
  position: relative;
  top: 0;
  left: 0;
}
.slider__nav-arrow {
  height: 34rem;
  width: 50vw;
  text-indent: -9999px;
  white-space: nowrap;
}
.slider__nav-arrow--left {
  --arrow: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 4 4'%3E %3Cpolyline points='3 1 1 2 3 3' stroke='white' stroke-width='.3' stroke-opacity='.5' fill='none'%3E%3C/polyline%3E %3C/svg%3E");
  cursor: var(--arrow) 40 40, auto;
}
.slider__nav-arrow--right {
  --arrow: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 4 4'%3E %3Cpolyline points='1 1 3 2 1 3' stroke='white' stroke-width='.3' stroke-opacity='.5' fill='none'%3E%3C/polyline%3E %3C/svg%3E");
  cursor: var(--arrow) 40 40, auto;
}
.slider__nav-dots {
    margin-top: 0.5rem;
    display: inline-flex;
    position: relative;
    padding: 1em;
    pointer-events: none;
}
.slider__nav-dots::before {
  content: "";
  position: absolute;
  left: calc(1.5em);
  top: calc(1em);
  width: calc(1.5em);
  height: calc(0.8em);
  background-color: rgb(var(--darkblue));
  transition: transform 0.7s ease-out;
  transform: translateX(calc((1.5em + 0.5em * 2) * (var(--from-left) - 1)));
}
.slider__nav-dot {
  margin: 0 0.5rem;
  width: 1.5em;
  height: 0.8em;
  border: 1px solid rgb(var(--taupe));
  cursor: crosshair;
  pointer-events: all;
  display: inline-block;
}
.slider__nav-dot:hover, .slider__nav-dot:active {
    border-color: rgb(var(--lightblue));
}

@media only screen and (max-width: 650px) {
    .slider::before,
    .slider::after {
        display: none;
    }
    .slider__content, .slider__nav-arrow {
        height: 24.5rem;
    }
    .slider__nav-dots {
        margin-top: 0;
    }
    .slider__text-item-info {
        bottom: 1rem;
        right: 1rem;
    }
    .slider__text-item-info p {
        padding: 1em 0.8em;
    }
    .slider__text-item-head {
        top: 1rem;
        left: 1rem;
        transform: translateZ(0);
    }
    .slider__text-item-head h3 {
        font-size: 2rem;
    }
    .slider__nav-arrow {
        width: 10vw;
        position: relative;
        cursor: auto;
    }
    .slider__nav-arrow:active {
        filter: brightness(0.5);
    }
    .slider__nav-arrow::before {
        content: "";
        background-image: var(--arrow);
        background-size: cover;
        width: 3rem;
        height: 3rem;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        cursor: pointer;
    }
    .slider__nav-arrow--left {
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.7) 0, transparent 100%);
    }
    .slider__nav-arrow--right {
        background-image: linear-gradient(to left, rgba(0, 0, 0, 0.7) 0, transparent 100%);
    }
}

</style>
@endsection

@section('content')
    <section class="section active section-white" data-anchor="slider">
        <div class="wrapper">
            <div class="section-indent">
                <div class="slider" id="slider"> 
                    <div class="slider__content" id="slider-content">
                        <div class="slider__images">
                            <div class="slider__images-item slider__images-item--active" data-id="1"><img src="{{ asset('/public/img/1.jpg') }}"/></div>
                            <div class="slider__images-item" data-id="2"><img src="{{ asset('/public/img/3.jpg') }}"/></div>
                        </div>
                        <div class="slider__text">
                            <div class="slider__text-item slider__text-item--active" data-id="1">
                                <div class="slider__text-item-head">
                                    <h3>Контент 1</h3>
                                </div>
                                <div class="slider__text-item-info">
                                    <p>Описание контента 1</p>
                                </div>
                            </div>
                            <div class="slider__text-item" data-id="2">
                                <div class="slider__text-item-head">
                                    <h3>Контент 2</h3>
                                </div>
                                <div class="slider__text-item-info">
                                    <p>Описание контента 2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider__nav">
                        <div class="slider__nav-arrows">
                            <div class="slider__nav-arrow slider__nav-arrow--left" id="left"></div>
                            <div class="slider__nav-arrow slider__nav-arrow--right" id="right"></div>
                        </div>
                        <div class="slider__nav-dots" id="slider-dots">
                            <div class="slider__nav-dot slider__nav-dot--active" data-id="1"></div>
                            <div class="slider__nav-dot" data-id="2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="progress-slider-full" id="progress-slider-full"></div>-->
        </div>
    </section>
    <section class="section section-gray" data-anchor="events">
        <div class="wrapper">
            <div class="section-indent">
                <div class="title-section">
                    <h2>Мероприятия</h2>
                </div>
                <div class="section-content">
                    <div class="row events-container">
                        <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12 events-content">
                            <div class="events-item">
                                <div>
                                    <h1 class="events-date">14:15</h1>
                                    <div class="events-place">D2</div>
                                </div>
                                <div class="events-info">
                                    <h3>Название мероприятия</h3>
                                    <p>Описание детальное мероприятия и его составляющей Описание детальное мероприятия и его составляющей</p>
                                    <a href="">Подробнее</a>
                                </div>
                            </div>
                            <div class="events-item">
                                <div>
                                    <h1 class="events-date" >14:15</h1>
                                    <div class="events-place">D2</div>
                                </div>
                                <div class="events-info">
                                    <h3>Название мероприятия</h3>
                                    <p>Описание детальное мероприятия и его составляющей Описание детальное мероприятия и его составляющей</p>
                                    <a href="">Подробнее</a>
                                </div>
                            </div>
                            <div class="events-item">
                                <div>
                                    <h1 class="events-date">14:15</h1>
                                    <div class="events-place">D2</div>
                                </div>
                                <div class="events-info">
                                    <h3>Название мероприятия</h3>
                                    <p>Описание детальное мероприятия и его составляющей Описание детальное мероприятия и его составляющей</p>
                                    <a href="">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 datepicker-container">
                            <div id="datepicker" class="datepicker-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-sky" data-anchor="news">
        <div class="wrapper">
            <div class="section-indent">
                <div class="title-section">
                    <h2>Новости</h2>
                </div>
                <div class="row news-container">
                    <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12 news-content"></div>
                    <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 news-img-content">
                        <div class="news-img">
                            <img src="{{ asset('/public/img/test.png') }}">
                            <div class="progress-slider-full progress-30"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const request = new $.request;
            request.get('{{ route("site.home.news") }}').done(function(response) {
                $.each(response.news, function(key, value) {
                    var public_date = new Date(value.public_date);
                    var content = '\
                        <div class="news-item">\
                            <div class="news-date">\
                                <div class="news-circle">'+ 
                                    public_date.getDate() + '<br>' +
                                    (public_date.getMonth() + 1) +
                                '</div>\
                            </div>\
                            <div class="news-info">\
                                <h3>'+ value.title +'</h3>\
                                <p>'+ value.abbreviation +'</p>\
                                <a href="'+ value.url +'">Подробнее</a>\
                            </div>\
                        </div>\
                    ';
                    $('.news-content').append(content);
                });
            });
        });
        function lerp({ x, y }, { x: targetX, y: targetY }) {
            const fraction = 0.1;
            x += (targetX - x) * fraction;
            y += (targetY - y) * fraction;
            return { x, y };
        }

class Slider {
  constructor (el) {
    const imgClass = this.IMG_CLASS = 'slider__images-item';
    const textClass = this.TEXT_CLASS = 'slider__text-item';
    const activeImgClass = this.ACTIVE_IMG_CLASS = `${imgClass}--active`;
    const activeTextClass = this.ACTIVE_TEXT_CLASS =  `${textClass}--active`;
    
    this.el = el;
    this.contentEl = document.getElementById('slider-content');
    this.onMouseMove = this.onMouseMove.bind(this);
    
    // taking advantage of the live nature of 'getElement...' methods
    this.activeImg = el.getElementsByClassName(activeImgClass);
    this.activeText = el.getElementsByClassName(activeTextClass);
    this.images = el.getElementsByTagName('img');
    
    document.getElementById('slider-dots')
      .addEventListener('click', this.onDotClick.bind(this));
    
    document.getElementById('left')
      .addEventListener('click', this.prev.bind(this));
    
    document.getElementById('right')
      .addEventListener('click', this.next.bind(this));
    
    window.addEventListener('resize', this.onResize.bind(this));
    
    this.onResize();
    
    this.length = this.images.length;
    this.lastX = this.lastY = this.targetX = this.targetY = 0;
  }
  onResize () {
    const htmlStyles = getComputedStyle(document.documentElement);
    const mobileBreakpoint =  htmlStyles.getPropertyValue('--mobile-bkp');
    
    const isMobile = this.isMobile = matchMedia(
      `only screen and (max-width: ${mobileBreakpoint})`
    ).matches;
    
    this.halfWidth = innerWidth / 2;
    this.halfHeight = innerHeight / 2;
    this.zDistance = htmlStyles.getPropertyValue('--z-distance');
    
    if (!isMobile && !this.mouseWatched) {
      this.mouseWatched = true;
      this.el.addEventListener('mousemove', this.onMouseMove);
      this.el.style.setProperty(
        '--img-prev', 
        `url(${this.images[+this.activeImg[0].dataset.id - 1].src})`
      );
      this.contentEl.style.setProperty('transform', `translateZ(${this.zDistance})`);
    } else if (isMobile && this.mouseWatched) {
      this.mouseWatched = false;
      this.el.removeEventListener('mousemove', this.onMouseMove);
      this.contentEl.style.setProperty('transform', 'none');
    }
  }
  getMouseCoefficients ({ pageX, pageY } = {}) {
    const halfWidth = this.halfWidth;
    const halfHeight = this.halfHeight;
    const xCoeff = ((pageX || this.targetX) - halfWidth) / halfWidth;
    const yCoeff = (halfHeight - (pageY || this.targetY)) / halfHeight;
    
    return { halfWidth,  halfHeight }
  }
  onMouseMove ({ pageX, pageY }) {   
    this.targetX = pageX;
    this.targetY = pageY;
    
    if (!this.animationRunning) {
      this.animationRunning = true;
      this.runAnimation();
    }
  }
  runAnimation () {
    if (this.animationStopped) {
      this.animationRunning = false;
      return;
    }
    
    const maxX = 10;
    const maxY = 10;
    
    const newPos = lerp({
      x: this.lastX,
      y: this.lastY
    }, {
      x: this.targetX,
      y: this.targetY
    });
    
    const { xCoeff, yCoeff } = this.getMouseCoefficients({
      pageX: newPos.x, 
      pageY: newPos.y
    });
      
    this.lastX = newPos.x;
    this.lastY = newPos.y;

    this.positionImage({ xCoeff, yCoeff });
    
    this.contentEl.style.setProperty('transform', `
      translateZ(${this.zDistance})
      rotateX(${maxY * yCoeff}deg)
      rotateY(${maxX * xCoeff}deg)
    `);
    
    if (this.reachedFinalPoint) {
      this.animationRunning = false;
    } else {
      requestAnimationFrame(this.runAnimation.bind(this)); 
    }
  }
  get reachedFinalPoint () {
    const lastX = ~~this.lastX;
    const lastY = ~~this.lastY;
    const targetX = this.targetX;
    const targetY = this.targetY;
    
    return (lastX == targetX || lastX - 1 == targetX || lastX + 1 == targetX) 
        && (lastY == targetY || lastY - 1 == targetY || lastY + 1 == targetY);
  }
  positionImage ({ xCoeff, yCoeff }) {
    const maxImgOffset = 1;
    const currentImage = this.activeImg[0].children[0];
    
    currentImage.style.setProperty('transform', `
      translateX(${maxImgOffset * -xCoeff}em)
      translateY(${maxImgOffset * yCoeff}em)
    `);  
  }
  onDotClick ({ target }) {
    if (this.inTransit) return;
    
    const dot = target.closest('.slider__nav-dot');
    
    if (!dot) return;
    
    const nextId = dot.dataset.id;
    const currentId = this.activeImg[0].dataset.id;
    
    if (currentId == nextId) return;
    
    this.startTransition(nextId);
  }
  transitionItem (nextId) {
    function onImageTransitionEnd (e) {
      e.stopPropagation();
      
      nextImg.classList.remove(transitClass);
      
      self.inTransit = false;
      
      this.className = imgClass;
      this.removeEventListener('transitionend', onImageTransitionEnd);
    }
    
    const self = this;
    const el = this.el;
    const currentImg = this.activeImg[0];
    const currentId = currentImg.dataset.id;
    const imgClass = this.IMG_CLASS;
    const textClass = this.TEXT_CLASS;
    const activeImgClass = this.ACTIVE_IMG_CLASS;
    const activeTextClass = this.ACTIVE_TEXT_CLASS;
    const subActiveClass = `${imgClass}--subactive`;
    const transitClass = `${imgClass}--transit`;
    const nextImg = el.querySelector(`.${imgClass}[data-id='${nextId}']`);
    const nextText = el.querySelector(`.${textClass}[data-id='${nextId}']`);
    
    let outClass = '';
    let inClass = '';

    this.animationStopped = true;
    
    nextText.classList.add(activeTextClass);
    
    el.style.setProperty('--from-left', nextId);
    
    currentImg.classList.remove(activeImgClass);
    currentImg.classList.add(subActiveClass);
    
    if (currentId < nextId) {
      outClass = `${imgClass}--next`;
      inClass = `${imgClass}--prev`;
    } else {
      outClass = `${imgClass}--prev`;
      inClass = `${imgClass}--next`;
    }
    
    nextImg.classList.add(outClass);
    
    requestAnimationFrame(() => {
      nextImg.classList.add(transitClass, activeImgClass);
      nextImg.classList.remove(outClass);
      
      this.animationStopped = false;
      this.positionImage(this.getMouseCoefficients());
      
      currentImg.classList.add(transitClass, inClass);
      currentImg.addEventListener('transitionend', onImageTransitionEnd);
    });

    if (!this.isMobile)
      this.switchBackgroundImage(nextId);
  }
  startTransition (nextId) {
    function onTextTransitionEnd(e) {
      if (!e.pseudoElement) {
        e.stopPropagation();

        requestAnimationFrame(() => {
          self.transitionItem(nextId);
        });

        this.removeEventListener('transitionend', onTextTransitionEnd);
      }
    }
    
    if (this.inTransit) return;

    const activeText = this.activeText[0];
    const backwardsClass = `${this.TEXT_CLASS}--backwards`;
    const self = this;
    
    this.inTransit = true;
    
    activeText.classList.add(backwardsClass);
    activeText.classList.remove(this.ACTIVE_TEXT_CLASS);
    activeText.addEventListener('transitionend', onTextTransitionEnd);
    
    requestAnimationFrame(() => {
      activeText.classList.remove(backwardsClass);
    });
  }
  next () {
    if (this.inTransit) return;
    
    let nextId = +this.activeImg[0].dataset.id + 1;
    
    if (nextId > this.length)
        nextId = 1;
    
    this.startTransition(nextId);
  }
  prev () {
    if (this.inTransit) return;
    
    let nextId = +this.activeImg[0].dataset.id - 1;
    
    if (nextId < 1)
        nextId = this.length;
    
    this.startTransition(nextId);
  }
  switchBackgroundImage (nextId) {
    function onBackgroundTransitionEnd (e) {
      if (e.target === this) {
        this.style.setProperty('--img-prev', imageUrl);
        this.classList.remove(bgClass);
        this.removeEventListener('transitionend', onBackgroundTransitionEnd);
      }
    }

    const bgClass = 'slider--bg-next';
    const el = this.el;
    const imageUrl = `url(${this.images[+nextId - 1].src})`;
    
    el.style.setProperty('--img-next', imageUrl);
    el.addEventListener('transitionend', onBackgroundTransitionEnd);
    el.classList.add(bgClass);
  }
}

const sliderEl = document.getElementById('slider');
const slider = new Slider(sliderEl);

// ------------------ Demo stuff ------------------------ //

let timer = 0;

function autoSlide () {
  requestAnimationFrame(() => {
    slider.next();
  });
  
  timer = setTimeout(autoSlide, 8000);
}

function stopAutoSlide () {
  clearTimeout(timer);
  
  this.removeEventListener('touchstart', stopAutoSlide);
  this.removeEventListener('mousemove', stopAutoSlide);  
}

sliderEl.addEventListener('mousemove', stopAutoSlide);
sliderEl.addEventListener('touchstart', stopAutoSlide);

timer = setTimeout(autoSlide, 8000);
        $(document).ready(function() {
            /*
            var slider = $('.slider-full');
            slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {   
                var calc = ((nextSlide) / (slick.slideCount-1)) * 100;
                $('#progress-slider-full').css('background-size', calc + '% 100%').attr('aria-valuenow', calc);
            });
            */
            $('#datepicker').datepicker({
                changeMonth: false,
                changeYear: false
            });
        });
    </script>
@endsection
