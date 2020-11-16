var options = {
    data: [
        {"text": "Dashboard", "website-link": "/admin/dashboard"},
        {"text": "Schedules", "website-link": "/admin/schedules"},
        {"text": "Calendar", "website-link": "/admin/schedules/calendar"},
        {"text": "Reports", "website-link": "/admin/reports"},
        {"text": "Track Collector", "website-link": "/admin/tracker"},
        {"text": "Employees", "website-link": "/admin/employees"},
        {"text": "Register Truck", "website-link": "/admin/gtrucks"},
        {"text": "Truck Assignments", "website-link": "/admin/schedules/assignments"},
        {"text": "Announcements", "website-link": "/admin/announcements"},
        {"text": "Events", "website-link": "/admin/events"},
        {"text": "Profile", "website-link": "/admin/profile"},
        {"text": "Dumpsters", "website-link": "/admin/dumpsters"},
        {"text": "Add Employee", "website-link": "/admin/employees/create"},
        {"text": "Add Trucks", "website-link": "/admin/gtrucks/create"},
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