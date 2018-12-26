(function() {
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function(e) {
        // handle recent articles auto switching
        var rac = document.querySelectorAll("header .recent_articles__article").length;

        if (rac > 1) {
          let recentArticlesSwitcher = function () {
            var $activeArticle = document.querySelector("header .recent_articles__article[data-active='active']");
            var $nextArticle = $activeArticle.nextElementSibling;

            if (!$nextArticle) {
              $nextArticle = document.querySelector("header .recent_articles__article");
            }

            var $postID = $nextArticle.getAttribute("data-post-id");

            $activeArticle.setAttribute("data-active", "inactive");
            $nextArticle.setAttribute("data-active", "active");
            document.querySelector('header .recent_articles__switcher > li.active').classList.remove("active");
            document.querySelector("header .recent_articles__switcher > li[data-post-id='" + $postID + "']").classList.add("active");

          }

          let recentArticlesSwitcherInterval = setInterval(recentArticlesSwitcher, 5000);

          // handle recent articles manual switching
          let recentArticlesSwitchers = document.querySelectorAll("header .recent_articles__switcher > li");

          recentArticlesSwitchers.forEach(function(switcher) {
            switcher.addEventListener("click", function(e) {
              if (switcher.classList.contains("active"))
                return;

              clearInterval(recentArticlesSwitcherInterval);
              
              var $activeSwitcher = document.querySelector('header .recent_articles__switcher > li.active');
              var $postID = switcher.getAttribute("data-post-id");

              $activeSwitcher.classList.remove("active");
              document.querySelector("header .recent_articles__article[data-active='active']").setAttribute("data-active", "inactive");
              switcher.classList.add("active");
              document.querySelector("header .recent_articles__article[data-post-id='" + $postID + "']").setAttribute("data-active", "active");

              recentArticlesSwitcherInterval = setInterval(recentArticlesSwitcher, 5000);
            });
          });
        }

        // handle recent articles auto switching (mobile)
        var mrac = document.querySelectorAll(".recent_articles__mobile .recent_articles__article").length;

        if (mrac > 1) {
          var mrecentArticlesSwitcher = function () {
            var $activeArticle = document.querySelector(".recent_articles__mobile .recent_articles__article[data-active='active']");
            var $nextArticle = $activeArticle.nextElementSibling;

            if (!$nextArticle) {
              $nextArticle = document.querySelector(".recent_articles__mobile .recent_articles__article");
            }

            var $postID = $nextArticle.getAttribute("data-post-id");

            $activeArticle.setAttribute("data-active", "inactive");
            $nextArticle.setAttribute("data-active", "active");
            document.querySelector('.recent_articles__mobile .recent_articles__switcher > li.active').classList.remove("active");
            document.querySelector(".recent_articles__mobile .recent_articles__switcher > li[data-post-id='" + $postID + "']").classList.add("active");

          }

          var mrecentArticlesSwitcherInterval = setInterval(mrecentArticlesSwitcher, 5000);

          // handle recent articles manual switching
          var mrecentArticlesSwitchers = document.querySelectorAll(".recent_articles__mobile .recent_articles__switcher > li");

          mrecentArticlesSwitchers.forEach(function (switcher) {
            switcher.addEventListener("click", function (e) {
              if (switcher.classList.contains("active"))
                return;

              clearInterval(mrecentArticlesSwitcherInterval);

              var $activeSwitcher = document.querySelector('.recent_articles__mobile .recent_articles__switcher > li.active');
              var $postID = switcher.getAttribute("data-post-id");

              $activeSwitcher.classList.remove("active");
              document.querySelector(".recent_articles__mobile .recent_articles__article[data-active='active']").setAttribute("data-active", "inactive");
              switcher.classList.add("active");
              document.querySelector(".recent_articles__mobile .recent_articles__article[data-post-id='" + $postID + "']").setAttribute("data-active", "active");

              mrecentArticlesSwitcherInterval = setInterval(mrecentArticlesSwitcher, 5000);
            });
          });
        }

        // handle category switcher view toggle
        var $toggler = document.querySelector(".widget__category_switcher__toggler");

        if ($toggler) {
          $toggler.addEventListener("click", function(e) {
            var $categories = document.querySelector(".widget__category_switcher > section > ul");
  
            if ($categories.getAttribute("data-state") === "open") {
              $categories.setAttribute("data-state", "closed");
            } else {
              $categories.setAttribute("data-state", "open");
            }
          });
        }

        // handle testimonials switching
        var $testimonialWidget = document.querySelector(".widget__testimonials");

        if ( $testimonialWidget ) {
          
          document.querySelector(".widget__testimonials .object__arrow_right").addEventListener("click", function(e) {
            var $active = e.currentTarget.previousElementSibling.querySelector("li[data-state='active']");
            var $next = $active.nextElementSibling || e.currentTarget.previousElementSibling.querySelector("li:first-child");

            if ($next) {
              $active.setAttribute("data-state", "inactive");
              $next.setAttribute("data-state", "active");
            }
          });

          document.querySelector(".widget__testimonials .object__arrow_left").addEventListener("click", function (e) {
            var $active = e.currentTarget.nextElementSibling.querySelector("li[data-state='active']");
            var $prev = $active.previousElementSibling || e.currentTarget.nextElementSibling.querySelector("li:last-child");

            if ($prev) {
              $active.setAttribute("data-state", "inactive");
              $prev.setAttribute("data-state", "active");
            }
          });
        }

        // handle teams carousel switching

    });
  }
})();