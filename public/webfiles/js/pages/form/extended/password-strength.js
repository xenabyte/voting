"use strict";$(document).ready(function(){$("#password-1").pwstrength(),$("#password-2").pwstrength({ui:{showVerdictsInsideProgressBar:!0,progressBarMinWidth:0,progressBarMinPercentage:0}}),$("#password-3").pwstrength({ui:{showVerdictsInsideProgressBar:!0,progressBarMinWidth:0,progressBarMinPercentage:0}}),$("#password-4").pwstrength({common:{usernameField:"#username-4"},ui:{progressBarMinWidth:0,progressBarMinPercentage:0}}),$("#password-5").pwstrength({ui:{showPopover:!0,popoverPlacement:"top"}}),$("#password-6").pwstrength({ui:{showStatus:!0,showProgressBar:!1}})});