//ripple
const list = document.querySelectorAll(".tim17, .tim44");
const ripple = document.querySelectorAll(".tim18, .tim45");
const content = document.querySelector(".tim31");
for (let links = 0; links < list.length; links++) {
  list[links].onmousedown = function (e) {
    let createRipple = document.createElement("span");
    createRipple.classList.add("tim19");
    let size = Math.max(this.clientWidth, this.clientHeight);
    createRipple.style.width = createRipple.style.height = `${size}px`;
    if (list[links].className.endsWith("tim17")) {
      createRipple.style.top = `${e.clientY - this.offsetTop - size / 2}px`;
      createRipple.style.left = `${e.clientX - this.offsetLeft - size / 2}px`;
    } else {
      createRipple.style.top = `${
        e.clientY - this.offsetTop - size / 2 - 330 + window.pageYOffset
      }px`;
      createRipple.style.left = `${
        e.clientX - this.offsetLeft - size / 2 - content.offsetLeft
      }px`;
    }
    ripple[links].appendChild(createRipple);
    createRipple.addEventListener("webkitAnimationEnd", () => {
      ripple[links].removeChild(createRipple);
    });
  };
}
//translate3d
const logo = document.querySelector(".tim30");
window.addEventListener("scroll", function () {
  let roll = window.pageYOffset;
  logo.style.transform = `translate3d(0px, ${roll / 3}px, 0px)`;
});
//suave scroll
const menuItems = document.querySelectorAll(".scroll");
function getScrollTopByHref(element) {
  const id = element.getAttribute("href");
  let pixels = document.querySelector(id).offsetTop;
  return pixels > 0 ? pixels - 48 : pixels;
}
function scrollToPosition(to) {
  smoothScrollTo(0, to);
}
function scrollToIdOnClick(event) {
  event.preventDefault();
  const to = getScrollTopByHref(event.currentTarget);
  scrollToPosition(to);
}
menuItems.forEach((elements) => {
  elements.addEventListener("click", scrollToIdOnClick);
});
function smoothScrollTo(endX, endY, duration) {
  const startX = window.scrollX || window.pageXOffset;
  const startY = window.scrollY || window.pageYOffset;
  const distanceX = endX - startX;
  const distanceY = endY - startY;
  const startTime = new Date().getTime();
  duration = typeof duration !== "undefined" ? duration : 1200;
  // Easing function
  const easeInOutQuad = (time, from, distance, duration) => {
    time /= duration / 2;
    if (time < 1) {
      return (distance / 2) * time * time + from;
    }
    time--;
    return (-distance / 2) * (time * (time - 2) - 1) + from;
  };
  const timer = setInterval(() => {
    const time = new Date().getTime() - startTime;
    const newX = easeInOutQuad(time, startX, distanceX, duration);
    const newY = easeInOutQuad(time, startY, distanceY, duration);
    if (time >= duration) {
      clearInterval(timer);
    }
    window.scroll(newX, newY);
  }, 1000 / 60); //60 fps
}
//hamburger
const hamburger = document.querySelector(".tim21");
hamburger.addEventListener("click", () => {
  const menu = document.querySelector('.tim20');
  const line1 = document.querySelector('.tim23');
  const line2 = document.querySelector('.tim24');
  menu.classList.toggle('tim25');
  line1.classList.toggle('tim26');
  line2.classList.toggle('tim27');
})

//glider.js
new Glider(document.querySelector('.glider'), {
  slidesToScroll: 1,
  slidesToShow: 3,
  draggable: true,
  dots: '.dots',
  arrows: {
    prev: '.glider-prev',
    next: '.glider-next'
  },
  duration: 0.5,
  responsive: [
    {
      breakpoint: 450,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 270,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 750,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }
  ]
});