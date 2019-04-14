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

          var mrecentArticlesSwitcherInterval = setInterval(mrecentArticlesSwitcher, 4800);

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

              mrecentArticlesSwitcherInterval = setInterval(mrecentArticlesSwitcher, 4800);
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
          $(".testimonials__items.owl-carousel").owlCarousel({
            items: 1,
            autoPlay: true
          });
        }

        // handle teams carousel switching
        var $teamMembers = $('.team__members');

        if ($teamMembers) {
          $(".team__members.owl-carousel").owlCarousel({ 
            items: 7,
            dotsEach: 7,
            responsive: {
              0: { items: 2, dotsEach: 2 },
              600: { items: 4, dotsEach: 4 },
              768: { items: 5, dotsEach: 5 },
              992: { items: 7, dotsEach: 7 }
            }
          });

          // handle team viewing
          var content = document.querySelector(".team__content_content");

          document.querySelectorAll(".team__members li > a").forEach(function(a) {
            a.addEventListener("click", function(e) {
              e.preventDefault();

              var active = document.querySelector(".team__members li > a[data-state='active']");
              var id = a.getAttribute("data-id");
              var teamMember = document.querySelector(`.team_member[data-id="${id}"`);
              
              if (a == active) {
                content.setAttribute("data-state", "visible");
                a.setAttribute("data-state", "inactive");
                teamMember.setAttribute("data-state", "hidden");
                
                return;
              }
              
              if (active) {
                var activeTeamMember = document.querySelector(`.team_member[data-id="${active.getAttribute("data-id")}"`);
                activeTeamMember.setAttribute("data-state", "hidden");
                active.setAttribute("data-state", "inactive");
              }

              content.setAttribute("data-state", "hidden");
               teamMember.setAttribute("data-state", "visible");
               a.setAttribute("data-state", "active");
            });
          })
        }

        // handle posts sorter dropdown
        var $sorter = document.querySelector(".widget__sort_posts");

        if ($sorter) {
          document.querySelector(".widget__sort_posts .sort_posts__switcher > p").addEventListener("click", function(e) {
            var $switcher = e.srcElement.nextElementSibling;

            if ($switcher.classList.contains("open")) {
              $switcher.classList.remove("open");
            } else {
              $switcher.classList.add("open");
            }
          });
        }

        // handle asset class view by year state
        var $switchers = document.querySelectorAll('.switcher');

        if ($switchers.length) {
          $switchers.forEach(function($switcher) {
            let $list = $switcher.querySelector("ul");

            $switcher.querySelector(".active_holder").addEventListener("click", function (e) {
              e.preventDefault();
  
              if ( $list.getAttribute("data-state") === "closed" ) {
                $list.setAttribute("data-state", "open");
              } else {
                $list.setAttribute("data-state", "closed");
              }
            });

            var type = $switcher.getAttribute("data-type");

            if (type === "year")
            {
              $switcher.querySelectorAll("ul > li").forEach(function(el) {
                el.addEventListener("click", switchYear.bind(this, el));
              });
            }

            if (type === "month") {
              $switcher.querySelectorAll("ul > li").forEach(function(el) {
                el.addEventListener("click", switchMonth.bind(this, el));
              });
            }
          });
          
          function switchYear(year) 
          {
            if (year.getAttribute("data-state") == "active")
              return;
            
            let yearVal = year.getAttribute("data-year");
            let $activeYear = document.querySelector(".switcher[data-type='year'] > ul > li[data-state='active']");
            let activeMonth = document.querySelector(".switcher[data-type='month'] > ul > li[data-state='active']")
              .getAttribute("data-month");

            if ($activeYear)
              $activeYear.setAttribute("data-state", "inactive");
              
            year.setAttribute("data-state", "active");
            document.querySelector(".switcher[data-type='year'] .active_holder").textContent = yearVal;

            document.querySelectorAll(".asset_classes__class").forEach(function (element) {
              if (activeMonth === "all") {
                if (element.getAttribute("data-year") == yearVal
                  || yearVal === "all") {
                  element.setAttribute("data-state", "visible");
                } else {
                  element.setAttribute("data-state", "hidden");
                }
              } else {
                if (element.getAttribute("data-year") == yearVal
                  && (element.getAttribute("data-month") == activeMonth)) {
                  element.setAttribute("data-state", "visible");
                } else if (yearVal === "all" 
                  && (element.getAttribute("data-month") == activeMonth)) {
                  element.setAttribute("data-state", "visible");
                } else {
                  element.setAttribute("data-state", "hidden");
                }
              }
            });

            toggleMonths(yearVal);
            document.querySelector(".switcher[data-type='year'] > ul").setAttribute("data-state", "closed");
          }

          function switchMonth(month)
          {
            if (month.getAttribute("data-state") == "active")
              return;

            let monthVal = month.getAttribute("data-month");
            let $activeMonth = document.querySelector(".switcher[data-type='month'] > ul > li[data-state='active']");
            let activeYear = document.querySelector(".switcher[data-type='year'] > ul > li[data-state='active']")
              .getAttribute("data-year");

            if ($activeMonth)
              $activeMonth.setAttribute("data-state", "inactive");

            month.setAttribute("data-state", "active");
            document.querySelector(".switcher[data-type='month'] .active_holder").textContent = monthVal;

            document.querySelectorAll(".asset_classes__class").forEach(function (element) {
              if (activeYear === "all") {
                if (element.getAttribute("data-month") == monthVal
                  || monthVal === "all") {
                  element.setAttribute("data-state", "visible");
                } else {
                  element.setAttribute("data-state", "hidden");
                }
              } else {
                if (element.getAttribute("data-month") == monthVal
                  && (element.getAttribute("data-year") == activeYear)) {
                  element.setAttribute("data-state", "visible");
                } else if (monthVal === "all"
                  && (element.getAttribute("data-year") == activeYear)) {
                  element.setAttribute("data-state", "visible");
                } else {
                  element.setAttribute("data-state", "hidden");
                }
              }
            });

            document.querySelector(".switcher[data-type='month'] > ul").setAttribute("data-state", "closed");
          }

          function toggleMonths(year)
          {
            document.querySelectorAll(".switcher[data-type=month] > ul > li").forEach(function(el) {
              if (year === "all" || el.getAttribute("data-month") === "all") 
              {
                el.setAttribute("data-view", "visible");
              }
              else if (!document.querySelector(`.asset_classes__class[data-year="${year}"][data-month="${el.getAttribute("data-month")}"]`))
              {
                el.setAttribute("data-view", "hidden");
              }
            });
          }
        }

        function appendChildrenToContainer(container, childClass)
        {
          var child = document.createElement("section");
          child.classList.add("empty");
          child.classList.add(childClass);

          container.appendChild(child);
        }

        var recentPostsContainer = document.querySelector(".posts__recent_container");

        if (recentPostsContainer && window.innerWidth >= 1280)
        {
          var numPosts = recentPostsContainer.querySelectorAll(".post_card").length;
          var numEmptyToAdd = 4 - (numPosts%4);

          if (numPosts % 4)
          {
            for (let i = numEmptyToAdd; i > 0; i--)
            {
              appendChildrenToContainer(recentPostsContainer, "post_card");
            }
          }
        }

        var beliefs = document.querySelectorAll(".belief");
        if (beliefs)
        {
          beliefs.forEach(function(belief, i) {
            belief.querySelector(".belief__image > div").addEventListener("click", function(e) {
              e.preventDefault();
              var heading = e.currentTarget.getAttribute("data-belief");
              var modal = document.querySelector(`.modal[data-belief="${heading}"]`);
              var frame = modal.querySelector("iframe");
              var player = new Vimeo.Player(frame);

              modal.setAttribute("data-state", "open");
              player.play();
            });
          });

          var modals = document.querySelectorAll(".modal");
          if (modals)
          {
            modals.forEach(function(el, i) {
              el.addEventListener("click", function(e) {
                var modalContent = el.querySelector(".modal__content");

                if (modalContent.contains(e.target))
                  return;

                var frame = el.querySelector("iframe");
                var player = new Vimeo.Player(frame);
                
                player.pause();
                el.setAttribute("data-state", "closed");
              });
            });
          }
        }
    });
  }
})();