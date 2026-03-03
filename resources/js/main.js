const navbarItems = document.querySelectorAll("#navbar-items .navbar-item");
const closeNavBtn = document.querySelector("#close-navbar span");
const closeHeadBtn = document.querySelectorAll("#header-nav-icon li span")[1];
const navBar = document.getElementById("nav-bar");
const navBarItems = document.getElementById("navbar-items");
// // 'border-bottom: 2px solid;'
const navbarHeader = document.querySelectorAll("#header-nav .navbar-item");
const hideNav = document.getElementById("hide-nav");
const visibleNav = document.getElementById("visible-nav");
const hideNavItems = document.querySelectorAll("#hide-nav .navbar-item-hide")
const closeModal = document.querySelector("#searchModal .close-modal");
const searchModal = document.getElementById("searchModal");
const searchBtn1 = document.getElementById("search-navbar");
const search_2 = document.getElementById("search_2");
const search_3 = document.querySelectorAll("#header-nav-icon li")[0];


console.log(closeModal)
// logic đóng searhModal
if(closeModal) {
    closeModal.addEventListener("click", () => {
        searchModal.setAttribute('style',"display:none;");
    });
}

// logic mở searchModal
if(searchBtn1) {
    searchBtn1.addEventListener("click", () => {
        searchModal.setAttribute('style',"display:block");
    });
}

if(search_2) {
    search_2.addEventListener("click", () => {
        searchModal.setAttribute('style',"display:block");
    });
}

if(search_3) {
    search_3.addEventListener("click", () => {
        searchModal.setAttribute('style',"display:block");
    });
}
// logic chuyển của nút
document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth' 
            });
        });

        window.addEventListener('scroll', () => {
            const visibleBtnHeight = 350;
            

            if(window.scrollY > visibleBtnHeight) {
                document.getElementById('backToTop').setAttribute('style','display: flex; transition : opacity 3s ease-in-out');
             }else {
                document.getElementById('backToTop').setAttribute('style','display : none;');
             }
            // console.log(window.scrollY)
        });

window.addEventListener('DOMContentLoaded', () => {
    const viewportWidthWithScroll = window.innerWidth;
    if(viewportWidthWithScroll <= 1024) {
        hideNav.setAttribute('style', 'display : none !important')
    }
    // groupNav.setAttribute('style','display: none;');
})


// thanh navbar xuất hiện khi khéo qua vị trí nhất định 
// navBar.setAttribute('style','display : none;')
window.addEventListener('scroll', () => {
    const navBar = document.getElementById("nav-bar");
    const headerHeight = 150 ;
    // console.log(headerHeight);
    
    const viewportWidthWithScroll = window.innerWidth;
    if(window.scrollY > headerHeight) {
        navBar.setAttribute('style','display: flex !important');
        navBar.setAttribute('transition','opacity 0.4s ease,transform 0.4s ease,visibility 0.4s;');
    
        if(viewportWidthWithScroll > 1024) {
            navBarItems.setAttribute('style','display: flex;');
        }

    }else {
        navBar.setAttribute('style','display: none;');
        if(closeNavBtn && closeHeadBtn && closeNavBtn.outerText !== "close" && closeHeadBtn.outerText !== "close") {
            visibleNav.setAttribute('style','display : none');
        }
        if(window.innerWidth > 1024) {
            visibleNav.setAttribute('style','display : none !important');
        }
    
    }
});

{/* <span class="material-symbols-outlined">close</span> */}

// thay đổi icon khi ấn trên nav và header
// console.log(closeHeadBtn.outerText,closeNavBtn.outerText);
if(closeHeadBtn) {
    closeHeadBtn.addEventListener('click', () => {
        if(closeHeadBtn.outerText === "menu") {
            closeHeadBtn.textContent = "close";
            // navBar.setAttribute('style', 'display : flex');
            // navBarItems.setAttribute('style', 'display : flex')
            visibleNav.setAttribute('style', 'display : flex');
            // navBarItems.removeAttribute('style', 'display: none !important;');
            if(closeNavBtn && closeNavBtn.outerText !== "close") {
                closeNavBtn.textContent = "close";
            }
        }else {
            closeHeadBtn.textContent = "menu";
            // navBar.setAttribute('style','display : flex;');
            // navBarItems.setAttribute('style', 'display : none !important');
            visibleNav.setAttribute('style', 'display : none !important');
            if(closeNavBtn && closeNavBtn.outerText !== "menu") {
                closeNavBtn.textContent = "menu";
            }
        }
    })
}

if(closeNavBtn) {
    closeNavBtn.addEventListener('click', () => {
        if(closeNavBtn.outerText === "menu") {
            closeNavBtn.textContent = "close";
            // navBarItems.setAttribute('style', 'display : flex');
            visibleNav.setAttribute('style', 'display : flex')
            // navBarItems.setAttribute('style', 'display : none !important')
            if(closeHeadBtn && closeHeadBtn.outerText !== "close") {
                closeHeadBtn.textContent = "close";
            }
        }else {
            closeNavBtn.textContent = "menu";
            navBarItems.setAttribute('style', 'display : flex')
            navBar.setAttribute('style','display : flex;');
            visibleNav.setAttribute('style', 'display : none !important');
            if(closeHeadBtn && closeHeadBtn.outerText !== "menu") {
                closeHeadBtn.textContent = "menu";
            }
        }
    })
}

// logic chuyen thanh gach duoi
// chuyển gạch cho navbar
hideNavItems.forEach((item) => {
    const link = item.querySelector('a');
    const currentPath = window.location.pathname.slice(1);
    const href = link.getAttribute('href');
    const isHome = (currentPath === "/" || currentPath.endsWith("index.html" || 
        link.baseURI.includes("index.html")
    ));

    const viewportWidthWithScroll = window.innerWidth;
    console.log(viewportWidthWithScroll)
    const isCurrentPage = (href !== "index.html")&& (currentPath.includes(href));
    // console.log(viewportWidthWithScroll);
    if(viewportWidthWithScroll > 1024) {
         if(isHome) {
            hideNavItems[0].setAttribute('style','border-bottom: 2px solid;');
        }else if (isCurrentPage) {
            item.setAttribute('style','border-bottom: 2px solid;');
        }else{
            item.removeAttribute('style');
        }
    }
});

// chuyển gạch cho header
navbarHeader.forEach((item) => {
    const link = item.querySelector('a');
    const currentPath = window.location.pathname.slice(1);
    const href = link.getAttribute('href');
    const isHome = (currentPath === "/" || currentPath.endsWith("index.html" || 
        link.baseURI.includes("index.html")
    ));

    const viewportWidthWithScroll = window.innerWidth;
    console.log(viewportWidthWithScroll)
    const isCurrentPage = (href !== "index.html")&& (currentPath.includes(href));
    // console.log(viewportWidthWithScroll);
    if(viewportWidthWithScroll > 1024) {
         if(isHome) {
            navbarHeader[0].setAttribute('style',('style', 'border-bottom: 2px solid;'));
        }else if (isCurrentPage) {
            item.setAttribute('style',('style', 'border-bottom: 2px solid;'));
        }else{
            item.removeAttribute('style');
        }
    }
});

// logic của ảnh chuyển động 
const slider = document.getElementById('slider');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

// Only add event listeners if slider exists (home page has it, category pages don't)
if (nextBtn) {
    nextBtn.addEventListener('click', () => {
        // Cuộn sang phải một khoảng bằng chiều rộng 1 item + gap
        const itemWidth = document.querySelector('.slider-item').offsetWidth + 20;
        slider.scrollBy({ left: itemWidth, behavior: 'smooth' });
    });
}

if (prevBtn) {
    prevBtn.addEventListener('click', () => {
        // Cuộn sang trái
        const itemWidth = document.querySelector('.slider-item').offsetWidth + 20;
        slider.scrollBy({ left: -itemWidth, behavior: 'smooth' });
    });
}