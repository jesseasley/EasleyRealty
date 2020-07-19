function displayCarousel(obj, ctl)
{
    //sample call with the maximum number of option parameters -- just pass in the parameters you need
    //displayCarousel({ city: "Flower Mound", minPrice: "300000", maxPrice: "400000", minBeds: "4",
    //      mls: "12345678", maxBeds: "5", minBaths: "2", 
    //      time: "5000", <---this is the delay between slides. if omitted, it defaults to a 5 second delay
    //      transitionStyle: "slide", <---this is the transition style.  slide and fade are supported
    //                                   if omitted, it defaults to slide
    //      indicators: "on" <--- this causes the bullets to display at the bottom of the slide, on and off are supported
    //                            if omitted it defaults to on
    //}, "<control name>");

    if (obj.city === undefined) city = "Plano"; else city = obj.city;
    if (obj.minPrice === undefined) minPrice = "390000"; else minPrice = obj.minPrice;
    if (obj.maxPrice === undefined) maxPrice = "400000"; else maxPrice = obj.maxPrice;
    if (obj.minBeds === undefined) minBeds = ""; else minBeds = obj.minBeds;
    if (obj.mls === undefined) mls = ""; else mls = obj.mls;
    if (obj.maxBeds === undefined) maxBeds = ""; else maxBeds = obj.maxBeds;
    if (obj.minBaths === undefined) minBaths = ""; else minBaths = obj.minBaths;
    if (obj.time === undefined) time = 5000; else time = parseInt(obj.time);
    (obj.transitionStyle === undefined) ? transitionStyle = "slide" : transitionStyle = obj.transitionStyle;
    (obj.indicators === undefined) ? indicators = "on" : indicators = obj.indicators;
        //options are slide|fade
    $.ajax({
        type: "GET",
        url: "active_listings_new.php",
        data: "city=" + city + "&mls=" + mls + "&minBeds=" + minBeds + "&maxBeds=" + maxBeds + 
            "&minBaths=" + minBaths + "&minPrice=" + minPrice + "&maxPrice=" + maxPrice,
        success: function (data) {
            first = 1;
            
            html = "<div id='" + ctl + "Carousel' class='carousel slide";
            //html += " class='carousel carousel-slide";
            //if (transitionStyle === "fade")
            //    html += "fade";
            //html += "' ";
            html += " data-ride='carousel' data-interval='" + time + "'>\n";
            html += "   <div class='carousel-inner'>\n";

            carouselCounter = 0;
            if (window.innerWidth < 1000)
                indicators = "off";
            if (indicators === "on") {
                html += "<ol class='carousel-indicators'>";
                $(data).find("Row").each(
                    function (j, f) {
                        html += "    <li data-target='#" + ctl + "Carousel' data-slide-to='" + carouselCounter + "'";
                        if (carouselCounter === 0)
                            html += " class='active'";
                        html += "></li> ";
                        carouselCounter += 1;
                    });
                html += "</ol>";
            }
            $(data).find("Row").each(
                function (j, f) {
                    if (first === 1) {
                        first = 0;
                        html += "<div class='item active row'>\n";
                    }
                    else {
                        html += "<div class='item row'>\n";
                    }
                    if (window.innerWidth > 1000) {
                        html += "            <div class='row'>\n";
                        html += "               <div class='col-lg-12'>\n";
                        html += "                  <center>\n";
                        html += "                     <a href=\"" + $(f).find("url").text() + "\" target=_empty>\n";
                        html += "                        " + $(f).attr("fullAddr") + "\n";
                        html += "                     </a>\n";
                        html += "                  </center>\n";
                        html += "                  <hr>\n";
                        html += "               </div>\n";
                        html += "            </div>\n";
                        html += "            <div class='row'>\n";
                        html += "               <div class='col-lg-7 col-sm-7'>\n";
                        html += "                  <center>\n";
                        html += "                     <a href=\"" + $(f).find("url").text();
                        html += "\" target=_empty><img src=\"" + $(f).attr("img") + "\" style='width:80%;'></a>\n";
                        html += "                  </center>\n";
                        html += "               </div>\n";
                        html += "               <div class='col-lg-5 col-sm-5'>\n";
                        html += "                  <div>" + $(f).attr("bed") + " bedrooms</div>\n";
                        html += "                  <div>" + $(f).attr("baths") + " baths</div><br>\n";
                        html += "                  <div>" + $(f).attr("sqft") + "</div>\n";
                        html += "                  <div>Lot size " + $(f).attr("acres") + " acres</div><br>\n";
                        html += "                  MLS# " + $(f).attr("mlsNo") + "\n";
                        html += "               </div>\n";
                        html += "            </div>\n";
                        html += "            <div class='row'>\n";
                        html += "               <div class='col-lg-12'>\n";
                        html += "                  <center>\n";
                        html += "                     " + $(f).attr("price") + "\n";
                        html += "                  </center>\n";
                        html += "               </div>\n";
                        html += "            </div>\n";
                    }
                    else {
                        //mobile
                        html += "            <div class='row'>\n";
                        html += "               <div class='col-lg-7 col-sm-7'>\n";
                        html += "                  <center>\n";
                        html += "                     <span>\n";
                        html += "                        " + $(f).attr("fullAddr") + "\n";
                        html += "                     </span>\n";
                        html += "                     <a href=\"" + $(f).find("url").text() + "\" target=_empty>";
                        html += "                        <img src=\"" + $(f).attr("img") + "\" style='width:80%;'>";
                        html += "                     </a>\n";
                        html += "                  </center>\n";
                        html += "               </div>\n";
                        html += "            </div>\n";
                        html += "            <div class='row'>\n";
                        html += "               <table width='80%'>\n";
                        html += "                  <tr>\n";
                        html += "                     <td width='20%'>" + $(f).attr("bed") + " bed </td>\n";
                        html += "                     <td width='25%'>" + $(f).attr("mobileBaths") + " bath </td>\n";
                        html += "                     <td width='30%'>" + $(f).attr("sqft") + " </td>\n";
                        html += "                     <td width='25%'style='text-align:right;'>" + $(f).attr("acres") + " acres</td>\n";
                        html += "                  </tr>\n";
                        html += "               </table>\n";
                        html += "            </div>\n";
                        html += "            <div class='row'>\n";
                        html += "               <table width='80%'>\n";
                        html += "                  <tr>\n";
                        html += "                     <td width='20%'>MLS# " + $(f).attr("mlsNo") + "</td>\n";
                        html += "                     <td width='20%' style='text-align:right;'>" + $(f).attr("price") + "</td>\n";
                        html += "                  </tr>\n";
                        html += "               </table>\n";
                        html += "            </div>\n";
                    }
                    html += "      </div>\n";

                }
            );
            html += "   </div>\n";
            html += "   <a class='left carousel-control' href='#" + ctl + "Carousel' role='button' data-slide='prev'>\n";
            html += "      <span class='glyphicon glyphicon-chevron-left'></span>\n";
            html += "      <span class='sr-only'>Previous</span>\n";
            html += "   </a>\n";
            html += "   <a class='right carousel-control' href='#" + ctl + "Carousel' role='button' data-slide='next'>\n";
            html += "      <span class='glyphicon glyphicon-chevron-right'></span>\n";
            html += "      <span class='sr-only'>Next</span>\n";
            html += "   </a>\n";
            html += "</div>\n";

            $("#" + ctl).html(html);
            $('.carousel').carousel();
        },
        error: function (j, err) {
            alert("error on call to active_listings_new: " + j.status);
        }
    }).fail(function () {
        alert("AJAX Call failed on active_listings_new");
    });
}
