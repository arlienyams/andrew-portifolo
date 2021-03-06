// NAVIGATION
jQuery(document).ready(function ($) {

    "use strict";

    var siteMenuClone = function () {

        // Clone main navigation
        $('.clone-main-nav').each(function () {
            var $this = $(this);
            $this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
        });

        setTimeout(function () {
            var counter = 0;
            $('.site-mobile-menu .menu-item-has-children').each(function () {
                var $this = $(this);
                $this.prepend('<span class="arrow-collapse collapsed">');
                $this.find('.arrow-collapse').attr({
                    'data-toggle': 'collapse',
                    'data-target': '#collapseItem' + counter,
                });
                $this.find('> ul').attr({
                    'class': 'collapse',
                    'id': 'collapseItem' + counter,
                });
                counter++;
            });
        }, 1000);

        $('body').on('click', '.arrow-collapse', function (e) {
            var $this = $(this);
            if ($this.closest('li').find('.collapse').hasClass('show')) {
                $this.removeClass('active');
            } else {
                $this.addClass('active');
            }
            e.preventDefault();
        });

        // Switch to mobile Menu at -768 screen size
        $(window).resize(function () {
            var $this = $(this),
                w = $this.width();

            if (w > 768) {
                if ($('body').hasClass('offcanvas-menu')) {
                    $('body').removeClass('offcanvas-menu');
                }
            }
        })

        // Open & Close side menu
        $('body').on('click', '.js-menu-toggle', function (e) {
            var $this = $(this);
            e.preventDefault();

            if ($('body').hasClass('offcanvas-menu')) {
                $('body').removeClass('offcanvas-menu');
                $this.removeClass('active');
            } else {
                $('body').addClass('offcanvas-menu');
                $this.addClass('active');
            }
        })

        // Close side menu when clicked outisde offcanvas
        $(document).mouseup(function (e) {
            var container = $(".site-mobile-menu");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('offcanvas-menu')) {
                    $('body').removeClass('offcanvas-menu');
                }
            }
        });
    };
    siteMenuClone();
});



$(document).ready(function () {
    $('#homeSlider').owlCarousel({
        loop: true,
        smartSpeed:4500,
        autoplay: true,
        autoplayTimeout:15000,
        animateOut: 'fadeOut',
        slideTransition: 'ease',
        dots: true,
        items: 1,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            }
        }
    })

    $('#testimonialSlider').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 7000,
        // autoplayHoverPause: true,
        dots: false,
        items: 1,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 2
            },
            768: {
                items: 3
            }
        }
    })

})
console.log('%c arlienyams', 'font-weight: bold; font-size: 40px; color: red; text-shadow: 3px 3px 0 rgb(245,221,8) , 6px 6px 0 rgb(5,148,68) ');




$(document).ready(function () {
    RESPONSIVEUI.responsiveTabs();
});

/* ----------------
ResponsiveTabs.js
Author: Pete Love | www.petelove.com
Version: 1.5
------------------- */
var RESPONSIVEUI = {};

RESPONSIVEUI.responsiveTabs = function () {
    if (!$(".tabs").hasClass("enabled")) {
        // if we haven't already enabled tabs
        $(".tabs").addClass("enabled"); // used to style tabs if JS is present

        //loop through all sets of tabs on the page
        var tablistcount = 1;

        $(".tabs").each(function () {
            var $tabs = $(this);

            // add tab heading and tab panel classes
            $tabs.children("h1,h2,h3,h4,h5,h6").addClass("tab-heading");
            $tabs.children("div").addClass("tab-panel");

            // determine if markup already identifies the active tab panel for this set of tabs
            // if not then set first heading and tab to be the active one
            var $activePanel = $tabs.find(".active-panel");
            if (!$activePanel.length) {
                var $activePanel = $tabs
                    .find(".tab-panel")
                    .first()
                    .addClass("active-panel");
            }

            $tabs
                .find(".tab-panel")
                .not(".active-panel")
                .hide()
                .attr("aria-hidden", "true"); //hide all except active panel
            $activePanel.attr("aria-hidden", "false");
            /* make active tab panel hidden for mobile */
            $activePanel.addClass("hidden-mobile");

            // wrap tabs in container - to be dynamically resized to help prevent page jump
            var $tabsWrapper = $("<div/>", { class: "tabs-wrapper" });
            $tabs.wrap($tabsWrapper);

            var highestHeight = 0;

            // determine height of tallest tab panel. Used later to prevent page jump when tabs are clicked
            $tabs.find(".tab-panel").each(function () {
                var tabHeight = $(this).height();
                if (tabHeight > highestHeight) {
                    highestHeight = tabHeight;
                }
            });

            //create the tab list
            var $tabList = $("<ul/>", { class: "tab-list", role: "tablist" });

            //loop through each heading in set
            var tabcount = 1;
            $tabs.find(".tab-heading").each(function () {
                var $tabHeading = $(this);
                var $tabPanel = $(this).next();

                $tabHeading.attr("tabindex", 0);

                // CREATE TAB ITEMS (VISIBLE ON DESKTOP)
                //create tab list item from heading
                //associate tab list item with tab panel
                var $tabListItem = $("<li/>", {
                    class: "tab",
                    id: "tablist" + tablistcount + "-tab" + tabcount,
                    "aria-controls": "tablist" + tablistcount + "-panel" + tabcount,
                    role: "tab",
                    tabindex: 0,
                    text: $tabHeading.text(),
                    keydown: function (objEvent) {
                        if (objEvent.keyCode == 13) {
                            // if user presses 'enter'
                            $tabListItem.click();
                        }
                    },
                    click: function () {
                        //Show associated panel

                        //set height of tab container to highest panel height to avoid page jump
                        $tabsWrapper.css("height", highestHeight);

                        // remove hidden mobile class from any other panel as we'll want that panel to be open at mobile size
                        $tabs.find(".hidden-mobile").removeClass("hidden-mobile");

                        // close current panel and remove active state from its (hidden on desktop) heading
                        $tabs
                            .find(".active-panel")
                            .toggle()
                            .removeClass("active-panel")
                            .attr("aria-hidden", "true")
                            .prev()
                            .removeClass("active-tab-heading");

                        //make this tab panel active
                        $tabPanel
                            .toggle()
                            .addClass("active-panel")
                            .attr("aria-hidden", "false");

                        //make the hidden heading active
                        $tabHeading.addClass("active-tab-heading");

                        //remove active state from currently active tab list item
                        $tabList.find(".active-tab").removeClass("active-tab");

                        //make this tab active
                        $tabListItem.addClass("active-tab");

                        //reset height of tab panels to auto
                        $tabsWrapper.css("height", "auto");
                    }
                });

                //associate tab panel with tab list item
                $tabPanel.attr({
                    role: "tabpanel",
                    "aria-labelledby": $tabListItem.attr("id"),
                    id: "tablist" + tablistcount + "-panel" + tabcount
                });

                // if this is the active panel then make it the active tab item
                if ($tabPanel.hasClass("active-panel")) {
                    $tabListItem.addClass("active-tab");
                }

                // add tab item
                $tabList.append($tabListItem);

                // TAB HEADINGS (VISIBLE ON MOBILE)
                // if user presses 'enter' on tab heading trigger the click event
                $tabHeading.keydown(function (objEvent) {
                    if (objEvent.keyCode == 13) {
                        $tabHeading.click();
                    }
                });

                //toggle tab panel if click heading (on mobile)
                $tabHeading.click(function () {
                    // remove any hidden mobile class
                    $tabs.find(".hidden-mobile").removeClass("hidden-mobile");

                    // if this isn't currently active
                    if (!$tabHeading.hasClass("active-tab-heading")) {
                        //get position of active heading
                        if ($(".active-tab-heading").length) {
                            var oldActivePos = $(".active-tab-heading").offset().top;
                        }

                        // close currently active panel and remove active state from any hidden heading
                        $tabs
                            .find(".active-panel")
                            .slideToggle()
                            .removeClass("active-panel")
                            .prev()
                            .removeClass("active-tab-heading");

                        //close all tabs
                        $tabs
                            .find(".tab-panel")
                            .hide()
                            .attr("aria-hidden", "true");

                        //open this panel
                        $tabPanel
                            .slideToggle()
                            .addClass("active-panel")
                            .attr("aria-hidden", "false");

                        // make this heading active
                        $tabHeading.addClass("active-tab-heading");

                        var $currentActive = $tabs.find(".active-tab");

                        //set the active tab list item (for desktop)
                        $currentActive.removeClass("active-tab");
                        var panelId = $tabPanel.attr("id");
                        var tabId = panelId.replace("panel", "tab");
                        $("#" + tabId).addClass("active-tab");

                        //scroll to active heading only if it is below previous one
                        var tabsPos = $(".tabs").offset().top;
                        var newActivePos = $(".active-tab-heading").offset().top;
                        if (oldActivePos < newActivePos) {
                            $("html, body")
                                .animate({ scrollTop: tabsPos }, 0)
                                .animate({ scrollTop: newActivePos }, 400);
                        }
                    } else {
                        // if this tab panel is already active
                        // hide panel but give it special hidden-mobile class so that it can be visible at desktop size
                        $tabPanel.removeClass("active-panel").slideToggle(function () {
                            $(this).addClass("hidden-mobile");
                        });

                        //remove active heading class
                        $tabHeading.removeClass("active-tab-heading");

                        //don't alter classes on tabs as we want it active if put back to desktop size
                    }
                });

                tabcount++;
            });

            // add finished tab list to its container
            $tabs.prepend($tabList);

            // next set of tabs on page
            tablistcount++;
        });
    }
};

window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.documentElement.scrollTop > 50) {
    document.getElementById("main").className = "header-color";
  } else {
    document.getElementById("main").className = "";
  }
}