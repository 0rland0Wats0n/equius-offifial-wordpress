(function() {
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function(e) {
      
        // handle recent articles auto switching
        var rac = document.querySelectorAll(".recent_articles__article").length;

        if (rac > 1) {
          var recentArticlesSwitcher = function () {
            var $activeArticle = document.querySelector(".recent_articles__article[data-active='active']");
            var $nextArticle = $activeArticle.nextElementSibling;

            if (!$nextArticle) {
              $nextArticle = document.querySelector(".recent_articles__article");
            }

            var $postID = $nextArticle.getAttribute("data-post-id");

            $activeArticle.setAttribute("data-active", "inactive");
            $nextArticle.setAttribute("data-active", "active");
            document.querySelector('.recent_articles__switcher > li.active').classList.remove("active");
            document.querySelector(".recent_articles__switcher > li[data-post-id='" + $postID + "']").classList.add("active");

          }

          var recentArticlesSwitcherInterval = setInterval(recentArticlesSwitcher, 5000);

          // handle recent articles manual switching
          var recentArticlesSwitchers = document.querySelectorAll(".recent_articles__switcher > li");

          recentArticlesSwitchers.forEach(function(switcher) {
            switcher.addEventListener("click", function(e) {
              if (switcher.classList.contains("active"))
                return;

              clearInterval(recentArticlesSwitcherInterval);
              
              var $activeSwitcher = document.querySelector('.recent_articles__switcher > li.active');
              var $postID = switcher.getAttribute("data-post-id");

              $activeSwitcher.classList.remove("active");
              document.querySelector(".recent_articles__article[data-active='active']").setAttribute("data-active", "inactive");
              switcher.classList.add("active");
              document.querySelector(".recent_articles__article[data-post-id='" + $postID + "']").setAttribute("data-active", "active");

              recentArticlesSwitcherInterval = setInterval(recentArticlesSwitcher, 5000);
            });
          });
        }
    });
  }
})();