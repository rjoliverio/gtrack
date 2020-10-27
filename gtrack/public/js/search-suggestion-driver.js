var options = {
    data: [
        {"text": "Dashboard", "website-link": "/driver/dashboard"},
        {"text": "Schedule", "website-link": "/driver/schedule"},
        {"text": "Reports", "website-link": "/driver/reports"},
        {"text": "Events", "website-link": "/driver/events"},
        {"text": "Location", "website-link": "/driver/location"},
        {"text": "Profile", "website-link": "/driver/profile"}
    ],

    getValue: "text",

    template: {
        type: "links",
        fields: {
            link: "website-link"
        }
    },
    list: {
        maxNumberOfElements: 5,
        match: {
            enabled: true
        },
        showAnimation: {
			type: "fade", //normal|slide|fade
			time: 400,
			callback: function() {}
		},

		hideAnimation: {
			type: "slide", //normal|slide|fade
			time: 400,
			callback: function() {}
        },
        onChooseEvent: function() {
            let selected=null;
            if($(".template-links").is(":visible")){
                selected = $(".template-links").getSelectedItemData();
            }else{
                selected = $(".template-links2").getSelectedItemData();
            }
            location.replace(selected["website-link"]);
        }
    },
    theme: "round"
};

$(".template-links").easyAutocomplete(options);
$(".template-links2").easyAutocomplete(options);