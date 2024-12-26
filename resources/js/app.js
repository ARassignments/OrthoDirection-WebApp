import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const contentDiv = document.getElementById("page-content");
    const errorDiv = `<!-- error-section -->
        <section class="error-section sec-pad-2 centred">
            <div class="auto-container">
                <div class="inner-box">
                    <figure class="error-image"><img src="assets/images/icons/error-1.png" alt=""></figure>
                    <h2>Oops, page not <br />found!</h2>
                    <p>Mauris urna velit in fermentum in in natoque. Tincidunt pellentesque et risus tincidunt <br />dignissim proin auctor.</p>
                    <a href="index.html" class="theme-btn btn-one"><span>Back To Home</span></a>
                </div>
            </div>
        </section>
        <!-- error-section end -->`;

    function loadPage(page) {
        fetch(`/${page}`)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Page not found");
                }
                return response.text();
            })
            .then((html) => {
                contentDiv.innerHTML = html;
            })
            .catch((error) => {
                contentDiv.innerHTML = errorDiv; // Display errorDiv content
            });
    }

    document.querySelectorAll(".navigator").forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const page = e.target.getAttribute("data-page");
            loadPage(page);
        });
    });

    // Load the default page (home) on first load
    loadPage("home");
});
