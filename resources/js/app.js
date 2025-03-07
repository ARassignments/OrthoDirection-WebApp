import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const preloader = document.querySelector('.preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.classList.add('hidden');
        });
    }
});

// window.Echo.private(`notifications.${userId}`)
//     .listen(".Illuminate\\Notifications\\Events\\BroadcastNotificationCreated", (e) => {
//         console.log("New Notification Received:", e);
//         updateNotifications(e.notification);
//     });

// function updateNotifications(notification) {
//     let notificationsContainer = document.querySelector(".message-body");
//     let unreadCount = document.querySelector(".notification.bg-primary");

//     let newNotification = `
//         <a href="javascript:void(0)"
//             class="py-6 px-7 d-flex align-items-center dropdown-item">
//             <span class="me-3">
//                 <img src="${notification.profile_img ? '/profile_images/' + notification.profile_img : '/assets/dash/assets/images/profile/user-1.jpg'}"
//                     alt="user" class="rounded-circle" width="48" height="48" />
//             </span>
//             <div class="w-75 d-inline-block v-middle">
//                 <h6 class="mb-1 fw-semibold lh-base">${notification.message}</h6>
//                 <span class="fs-2 me-1 text-body-secondary">Just now</span>
//                 <span class="fs-1 badge fw-semibold bg-${getStatusColor(notification.status)} text-capitalize">${notification.status}</span>
//             </div>
//         </a>
//     `;

//     notificationsContainer.insertAdjacentHTML("afterbegin", newNotification);

//     if (unreadCount) {
//         unreadCount.style.display = "block";
//     }
// }

// function getStatusColor(status) {
//     switch (status) {
//         case "pending":
//             return "warning-subtle text-warning";
//         case "approved":
//         case "completed":
//             return "success-subtle text-success";
//         case "rejected":
//         case "cancelled":
//             return "danger-subtle text-danger";
//         default:
//             return "secondary";
//     }
// }


// document.addEventListener("DOMContentLoaded", () => {
//     const errorDiv = `<!-- error-section -->
//         <section class="error-section sec-pad-2 centred">
//             <div class="auto-container">
//                 <div class="inner-box">
//                     <figure class="error-image"><img src="assets/images/icons/error-1.png" alt=""></figure>
//                     <h2>Oops, page not <br />found!</h2>
//                     <p>Mauris urna velit in fermentum in in natoque. Tincidunt pellentesque et risus tincidunt <br />dignissim proin auctor.</p>
//                     <a href="" class="theme-btn btn-one navigator" data-page="home"><span>Back To Home</span></a>
//                 </div>
//             </div>
//         </section>`;

//     const contentDiv = document.getElementById("page-content");

//     function loadPage(page) {
//         contentDiv.classList.remove("fade-in");
//         fetch(`user-side/${page}`)
//             .then((response) => {
//                 if (!response.ok) {
//                     throw new Error("Page not found");
//                 }
//                 return response.text();
//             })
//             .then((html) => {
//                 if (!html.trim()) {
//                     // Check if the response is empty
//                     throw new Error("Empty content");
//                 }
//                 contentDiv.innerHTML = html;
//                 reinitializePlugins();
//                 setTimeout(() => {
//                     contentDiv.classList.add("fade-in");
//                 }, 50);
//                 scrollToTop();
//             })
//             .catch((error) => {
//                 contentDiv.innerHTML = errorDiv;
//                 reinitializePlugins();
//                 setTimeout(() => {
//                     contentDiv.classList.add("fade-in");
//                 }, 50);
//                 scrollToTop();
//             });
//     }

//     function updateCurrentClass(targetPage) {
//         document
//             .querySelectorAll(
//                 "nav.main-menu .navigation li, .sticky-header .main-menu .navigation li"
//             )
//             .forEach((li) => {
//                 li.classList.remove("current");
//             });
//         document
//             .querySelectorAll(
//                 `nav.main-menu .navigation li a[data-page="${targetPage}"], .sticky-header .main-menu .navigation li a[data-page="${targetPage}"]`
//             )
//             .forEach((link) => {
//                 const parentLi = link.closest("li");
//                 if (parentLi) {
//                     parentLi.classList.add("current");
//                 }
//             });
//     }

//     document
//         .querySelectorAll(
//             "nav.main-menu .navigation li, .sticky-header .main-menu .navigation li"
//         )
//         .forEach((li) => {
//             li.classList.remove("current"); // Remove the 'current' class from all items
//         });

//     document
//         .querySelectorAll(
//             "nav.main-menu .navigation li a, .sticky-header .main-menu .navigation li a"
//         )
//         .forEach((link) => {
//             const linkHref = link.getAttribute("href");
//             const currentPath = window.location.pathname;

//             // Check if the href matches the current location path
//             if (
//                 linkHref === currentPath ||
//                 (linkHref === "/" && currentPath === "/")
//             ) {
//                 const parentLi = link.closest("li");
//                 if (parentLi) {
//                     parentLi.classList.add("current"); // Add the 'current' class to the matching item
//                 }
//             }
//         });

//     function reinitializePlugins() {
//         // Reinitialize Owl Carousel
//         // if (typeof $.fn.owlCarousel === "function") {
//         //     $(".owl-carousel").owlCarousel();
//         // }

//         // Reinitialize Fancybox
//         if ($.fn.fancybox) {
//             $("[data-fancybox]").fancybox();
//         }

//         // Reinitialize Nice Select
//         if ($.fn.niceSelect) {
//             $("select").niceSelect();
//         }

//         // Reinitialize WOW.js animations
//         if (typeof WOW === "function") {
//             new WOW().init();
//         }

//         // Reinitialize Bootstrap validation (if required for forms)
//         if (typeof $.fn.validate === "function") {
//             $("form").each(function () {
//                 $(this).validate();
//             });
//         }

//         // Reinitialize Appear.js (used for animations when elements come into view)
//         if ($.fn.appear) {
//             $(".appear").appear();
//         }

//         // Reinitialize Isotope (for filtering and sorting layouts)
//         if (typeof Isotope === "function") {
//             $(".isotope-grid").each(function () {
//                 let $grid = $(this).isotope({
//                     itemSelector: ".isotope-item",
//                     layoutMode: "fitRows",
//                 });
//             });
//         }

//         // Reinitialize Parallax Scroll (if used for background scrolling effects)
//         if (typeof $.fn.parallax === "function") {
//             $(".parallax-scroll").parallax();
//         }

//         // Reinitialize Style Switcher (if applicable)
//         // if ($.fn.styleSwitcher) {
//         //     $.styleSwitcher();
//         // }

//         // Reinitialize any custom scripts
//         reinitializeCustomScripts();
//     }

//     function reinitializeCustomScripts() {
//         // Add any additional custom reinitializations here

//         // Example: Tooltip reinitialization
//         $('[data-toggle="tooltip"]').tooltip();

//         // Example: Popover reinitialization
//         $('[data-toggle="popover"]').popover();

//         // Example: Reset form validations
//         $("form").each(function () {
//             if ($(this).data("validator")) {
//                 $(this).data("validator").resetForm();
//             }
//         });

//         // Example: Other interactive components (e.g., tabs, accordions)
//         $(".collapse").collapse();
//     }

//     document.body.addEventListener("click", (e) => {
//         if (e.target.classList.contains("navigator")) {
//             e.preventDefault();
//             const page = e.target.getAttribute("data-page");
//             if (page) {
//                 loadPage(page);
//                 updateCurrentClass(page);
//             }
//         }
//     });

//     function scrollToTop() {
//         window.scrollTo({
//             top: 0,
//             behavior: "smooth",
//         });
//     }

//     loadPage("home");
// });
