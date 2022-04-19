
        const menubtn = document.querySelector(".menu-btn");
        const navlinks = document.querySelector(".nav-links");

        menubtn.addEventListener('click', ()=>{
            navlinks.classList.toggle('mobile-menu');
        })
