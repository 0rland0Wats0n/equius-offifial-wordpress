// polyfulls
if (!Array.prototype.findIndex) {
  Object.defineProperty(Array.prototype, 'findIndex', {
    value: function (predicate) {
      // 1. Let O be ? ToObject(this value).
      if (this == null) {
        throw new TypeError('"this" is null or not defined');
      }

      var o = Object(this);

      // 2. Let len be ? ToLength(? Get(O, "length")).
      var len = o.length >>> 0;

      // 3. If IsCallable(predicate) is false, throw a TypeError exception.
      if (typeof predicate !== 'function') {
        throw new TypeError('predicate must be a function');
      }

      // 4. If thisArg was supplied, let T be thisArg; else let T be undefined.
      var thisArg = arguments[1];

      // 5. Let k be 0.
      var k = 0;

      // 6. Repeat, while k < len
      while (k < len) {
        // a. Let Pk be ! ToString(k).
        // b. Let kValue be ? Get(O, Pk).
        // c. Let testResult be ToBoolean(? Call(predicate, T, « kValue, k, O »)).
        // d. If testResult is true, return k.
        var kValue = o[k];
        if (predicate.call(thisArg, kValue, k, o)) {
          return k;
        }
        // e. Increase k by 1.
        k++;
      }

      // 7. Return -1.
      return -1;
    },
    configurable: true,
    writable: true
  });
}

(function() {

  var isElementInViewport = function(el, p) {
    var rect = el.getBoundingClientRect();
    var p = p || 1.25

    if (typeof jQuery === "function" && el instanceof jQuery) {
      el = el[0];
    }

    return rect.bottom > 0 &&
      rect.right > 0 &&
      rect.left < (window.innerWidth || document.documentElement.clientWidth) &&
      rect.top * p < (window.innerHeight || document.documentElement.clientHeight);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function(e) {
        // handle beliefs fade in
        var hasBeliefs = document.querySelector("#beliefs .belief");

        if (hasBeliefs) {
          window.addEventListener("scroll", function() {
            document.querySelectorAll(".belief").forEach(function (el) {
              if (isElementInViewport(el))
                el.setAttribute("data-in-view", "true");
            });
          })
        }

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
      var hasTeamWidget = document.querySelector(".widget__team");

      if (hasTeamWidget) {
        var reorder = function() {
          var members = Array.from(document.querySelectorAll(".widget__team .team__members li"));
          var refIndex = members.findIndex(function(member) {
            return member.getAttribute("data-is-ref") === "true";
          });

          for (let i = 0; i < refIndex; i++) {
            members[i].style.order = members.length - i;
          }

          var order = 1;

          for (let i = refIndex; i < members.length; i++) {
            members[i].style.order = order;
            order++;
          }
        }

        var $ref = document.querySelector(".widget__team .team__members li[data-is-ref='true']"),
          $nextButton = document.querySelector(".widget__team .widget_team__content .object__arrow_right"),
          $prevButton = document.querySelector(".widget__team .widget_team__content .object__arrow_left");

        $nextButton.addEventListener("click", function (el) {
          var $next = $ref.nextElementSibling;

          if (!$next)
            $next = document.querySelector(".widget__team .team__members li:first-child");

            
          // switch ref to next
          $ref.setAttribute("data-is-ref", "false");
          $ref = $next; 
          $next.setAttribute("data-is-ref", "true");

          // reorder other elements
          reorder();
        });
        

        $prevButton.addEventListener("click", function (el) {
          var $prev = $ref.previousElementSibling 
          
          if (!$prev)
            $prev = document.querySelector(".widget__team .team__members li:last-child");

          // switch ref to prev
          $ref.setAttribute("data-is-ref", "false");
          $ref = $prev;
          $prev.setAttribute("data-is-ref", "true");

          // reorder elements
          reorder();
        });
      }
    });
  }
})();