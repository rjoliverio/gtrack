var options = {
    data: [
        {"text": "Dashboard", "website-link": "/admin/dashboard"},
        {"text": "Schedules", "website-link": "/admin/schedules"},
        {"text": "Reports", "website-link": "/admin/reports"},
        {"text": "Track Collector", "website-link": "/admin/tracker"},
        {"text": "Register Admin", "website-link": "/admin/register/admin"},
        {"text": "Register Driver", "website-link": "/admin/register/driver"},
        {"text": "Register Truck", "website-link": "/admin/register/truck"},
        {"text": "Truck Assignments", "website-link": "/admin/assignment/truck"},
        {"text": "Announcements", "website-link": "/admin/announcement"},
        {"text": "Events", "website-link": "/admin/events"},
        {"text": "Profile", "website-link": "/admin/profile"}
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