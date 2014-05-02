<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Donate - xOS Webtop</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript">
        function slin(){
            document.getElementById('mdrop').className ='slidein';
			setTimeout("document.getElementById('mdrop').className ='mdropav';",1000)
			
        }
		function slon(){
            document.getElementById('mdrop').className ='slideout';
			setTimeout("document.getElementById('mdrop').className ='mdropiv';",1000)
        }
		function stayav() {
			document.getElementById('mdrop').className ='mdropav';
		}
  </script>
<style type="text/css">
body,td,th {
	color: #222;
}
body {
	background-image: url(images/background.png);
	background-size: cover;
}
.slidein {
	-webkit-animation-duration: 1s;
	-webkit-animation-name: slidein;
	-webkit-animation-iteration-count: 1;
}
@-webkit-keyframes slidein {
	from {
		left: -210px;
	}
	to {
		left: 0px;
	}
}
.slideout {
	-webkit-animation-duration: 1s;
	-webkit-animation-name: slideout;
	-webkit-animation-iteration-count: 1;
}
@-webkit-keyframes slideout {
	from {
		left: 0px;
	}
	to {
		left: -210px;
	}
}
		   body {
				user-select: none;
				-webkit-user-select: none;
				-moz-user-select: none;   
		   }
          .emphasis {
            font-size: 157%;
          }
          .instructions, #payout {
            font-size: 93%;
          }
          #not-paying {
            background-color: #ff8;
            margin: 5px;
            padding: 5px;
            border: 1px solid #bb4;
			width: 750px;
          }
          .slider-label {
            font-size: 110%;
          }
          #main {
            margin: auto; /* if we're in a wider window, center us. */
          }
          h2#title {
            margin-top: 0px; /* h2 by default puts our title way too low */
            margin-bottom: 15px; /* leave some space before the pitch */
          }
          .call-to-action {
            font-size: x-large; /* absolute size, so it stays constant relative to buttons */
            color: green;
          }
          .caption {
            font-size: small; /* absolute size, so it stays constant relative to photo */
            font-style: italic;
          }
          #pay-controls {
            margin-top: 1em;
          }
          #slider-table {
            /* Highlight the slider a bit; doesn't work in Safari (on Windows at least) */
            background: -webkit-radial-gradient(58% 36px, rgba(252,252,252,255), rgba(252,252,252,0) 200px);
          }
          #slider {
            width: 600px;
            -webkit-appearance: none !important; /* must do this to then style it */
            background: -webkit-gradient(linear, left top, right top, from(#faa), to(#afa), color-stop(.3, #beb));
            border: 1px inset white;
            height: 5px;
          }
          #amt-text {
            margin-left: -5px; /* hack to center it on the slider thumb pretty decently */
            padding-top: 5px; /* otherwise it touches the thumb */
          }
          .instructions {
            font-style: italic;
            color: gray;
          }
          #gift .why {
            display:none; /* they don't show till the slider reaches their level */
            margin-right: -4px; /* so periods turn into ellipses */
          }
          #amt-text-row {
            font-size: medium; /* explicitly, regardless of the rest of the page */
          }
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script>
          $(function() {
            // in an iframe, we should butt against the edges and have no background color.
            // by ourselves, we should be prettier.
            if (window == window.top) {
              $("body").css({
          
              });
            }
            FLAVOR = ($.browser.safari ? (/chrome/i.test(navigator.userAgent) ? "E" : "S") : "U");
          });
        </script>
</head>

<body>
<div id="launch">
  <p>LAUNCH xOS BETA</p>
  <p>(COMING SOON)</p>
</div>

<!--Menu Bar-->

<div id="topcontain"><img src="images/logo_NEW.png" id="logo"  width="245" height="160" onmouseover="slin()" onmouseout="slon()" style="position: absolute; z-index: 333; -moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;">
<div id="menubar">
<a href="index.php" class="menu"><div id="home">&nbsp;HOME&nbsp;</div></a>
<a href="donate.php" class="menu"><div id="download">&nbsp;DONATE&nbsp;</div></a>
<a href="http://xoswebtop.blogspot.com" class="menu"><div id="blog">&nbsp;BLOG&nbsp;</div></a>
<a href="dev/developer.php" class="menu"><div id="developer">&nbsp;DEVELOP&nbsp;</div></a>
<a href="about.php" class="menu"><div id="about">&nbsp;ABOUT&nbsp;</div></a>
</div>
<!--Menu Dropdown-->
<div id="mdrop" class="mdropiv" style="position: absolute; top: 136px;">
<font color="5fa8b6">
<p><br>xOS Webtop<br>
  <br>
xOS Mobile<br>
<br>
xOS Tablet
</p>
</font>
</div>
<!--Menu Dropdown-->



</div>

<div id="content" style="position: absolute; top: 175px; left: 0px; width: 100%;">
<img src="images/home.png" width="100%" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;"><br><br>
<div id="writing" style="background-color: #FFF; width: 98.4%; padding: 10px; box-shadow: 8px 8px 8px #333;">
<p>We the XProduct Team have developed xOS Webtop simply to learn. But the project has come farther then we first anticipated. Our previous server could not support the load that we were experiencing. At many times it would go down and stay down anywhere from 15 minutes to 4 hours! It is a great service and anyone wanting to make their own website or develop and test their code. Now we have gotten a dedicated server but, we need a business internet connection to run our server to the full. As many may know, this isn't cheap. So, Please consider giving a few bucks to help us stay operating and give you the best xOS experience possible.
<div id="main" align="center">
         <div id="pay-controls">
            <table id="slider-table">
              <tr>
                <td></td>
                <td><div class="instructions">Slide the slider to the right to see how we will thank you.</div>
              </tr>
              <tr>
                <td class="slider-label">Amount:</td>
                <td style="vertical-align: bottom">
                  <input id="slider" type="range" min=0 max=100 value=27 /><br/>
                </td>
              </tr>
              <tr>
                <td></td><td id="amt-text-row"><div id="amt-text">$<span id="amt-text-num"></span></div></td>
              </tr>
            </table>
            <div id="payout">
              <div id="gift">
                <span>In addition to warm feelings for supporting free software, I'll</span>
                <span class="why" min="2">send you a thank-you note</span>
                <span class="why" min="30">... and a generic poem</span>
                <span class="why" min="50">... and a unique poem about you</span>
                <span class="why" min="100">... and an autographed poem of whatever you want</span>
                <span class="why" min="200">... and I'll send you a hand written letter signed by the makers of xOS</span>
                <span class="why" min="300">... and I'll put you and/or your company as a proud supporter of xOS.</span>
                <span class="why" min="400">... and I'll physically mail you a super-fancy piece of wall art
                                                saying you/your friends/your meet up group/etc make xOS happen</span>
                .
              </div>
              <div id="not-paying" style="display:none">
                If you can afford to pay to help support the poor, please do.<br/>
                If you can't afford to pay, trust me we understand.<br/><br/>
                Please consider giving a few bucks. Every penny counts!
              </div>
            </div>
            <br/>
            <div id="payment-types">
              <span style="vertical-align:top" class="call-to-action">Donate with: </span>
              
              <span id="paypal-xclick-form">
              <form id="paypal-form" style="display: inline" action="https://www.paypal.com/cgi-bin/webscr"
                  method="post" name="_xclick" target="_blank">
                  <input type="hidden" name="item_name" value="XProduct">
                  <input type="hidden" name="item_number" id="tracking-input" >
                  <input type="hidden" name="amount" id="amount-input">
                  <input type="hidden" name="cmd" value="_xclick">
                  <input type="hidden" name="no_note" value="1">
                  <input type="hidden" name="business" value="brandonwayne@astound.net">
                  <input type="hidden" name="return" value="http://xos.xproduct.net/donated.php">
                  <input type="image" style="vertical-align: top" id="paypal-xclick-button" 
                         src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif"/>
                </form>
              </span>

            </div> <!-- payment-types -->
          </div> <!-- pay-controls -->

        </div> <!-- main -->
        <script>
          $(function() {
            if (FLAVOR == "S") {
              // Offer the correct email address as a gift
              $("#main").find(".browser-name").text("safari");
            }

            
            function recordTracking() {
              var tracking = "XPV2 DN ";
              $('#paypal-form [name="item_number"]').val(tracking);
            };
            recordTracking();

            // Update the slider UI and maybe plead with the user not to pay $0
            function onSliderChange() {
              var zero = ($("#slider").val() == 0);
              $("#not-paying").toggle(zero);
              $("#payment-types").toggle(!zero);
              $("#gift").toggle(!zero);

              updateAmountFromSlider();
            }
            // On slider change, adjust printed dollar value and position,
            // and update gift list
            function updateAmountFromSlider() {
              var here = $("#main");
              var val = $("#slider").val();
              var offset = val / 100 * ($("#slider").width() - 10);

              // Increasing speed from $2 to $400, but allowing $0
              var dollars = Math.min(Math.pow(val/5, 2) + 2, 400);
              if (val == 0) dollars = 0;

              var roundTo = (dollars <= 10 ? 1 : dollars <= 150 ? 5 : 25);
              dollars = Math.floor(dollars / roundTo) * roundTo;
              here.find('#amt-text').css({"padding-left": offset});
              here.find('#amt-text-num').text(dollars);

              here.find(".why").each(function(el) {
                $(this).toggle($(this).attr("min") <= dollars);
              });

              var amtString = dollars + ".00";
              $('#paypal-form [name="amount"]').val(amtString);
            }
            $("#main").find('input').change(onSliderChange);
            onSliderChange(); // set amount from default slider position
          });

          // Safari bug: click a button to submit a form, close the newly opened window
          // using your mouse (not keyboard), try to click the button again: nothing happens.
          // Any button submitting a form to the same URL won't work.  Workaround: modify the
          // URL harmlessly after onclick, so any later clicks are to a new URL.
          $('form input[type="image"]').click(function() {
            var that = this;
            window.setTimeout(function() {
              var theForm = $(that).closest("form")[0];
              if (!/\?/.test(theForm.action))
                theForm.action += "?";
              theForm.action += "&";
            }, 0);
          });
        </script>
        </div>
        <div id="footer" style="padding: 10px;">
<font color="#CCCCCC" size="-1">
<p>&copy; 2009-2011 XProduct</p>
</font>
<div id="html5"><img src="images/html5.png" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;"></div>
</div>
</div>


</body>
</html>