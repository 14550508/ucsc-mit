angular.module('app', ['ngResource'])
	.controller('controller', ['$scope', '$document', function ($scope, $document) {

		$scope.usefull_links = [
			"Staff Phone List",
			"Emergency Procedures Guide",
			"Contractor's Contact List",
			"HR Policies",
			"Email Help Desk",
			"Rapist reports",
			"Recent Newsletters",
			"Tenant Contact List"
		];

		$scope.site_owners = [
			"D3 Trainer",
			"Ross Robertson",
			"Sharing Minds",
			"Sophia Illingworth"
		];

		// sidebar
		function $e(selector) {
			var e = document.querySelector(selector);
			if (e) return e;
			return null;
		}

		const toggleButton = $e('.toggle-buttons');
		const overlay = $e('.overlay');
		const wrapper = $e('#wrapper');
		const offcanvas = $e('[data-toggle="offcanvas"]');

		let isSidebarOpened = false;

		const sidebar = {
			open: function () {
				wrapper.classList.add('toggled');
				toggleButton.classList.remove('isClosed');
				toggleButton.classList.add('isOpened');
				isSidebarOpened = true;
			},
			close: function () {
				wrapper.classList.remove('toggled');
				toggleButton.classList.remove('isOpened');
				toggleButton.classList.add('isClosed');
				isSidebarOpened = false;
			}
		};

		if (toggleButton && wrapper && offcanvas) {

			toggleButton.addEventListener('click', function () {
				return isSidebarOpened ? sidebar.close() : sidebar.open();
			});

			sidebar.open();
		}

		var events = [
			{
				title: 'dolor sit amet',
				start: '2016-12-01'
			},
			{
				title: 'consectetur adipisi',
				start: '2016-12-07',
				end: '2016-12-10'
			},
			{
				id: 999,
				title: 'consectetur adipisi',
				start: '2016-12-09T16:00:00'
			},
			{
				id: 999,
				title: 'consectetur adipisi',
				start: '2016-12-16T16:00:00'
			},
			{
				title: 'ipsam incidunt natus',
				start: '2016-12-11',
				end: '2016-12-13'
			},
			{
				title: 'Nihil eaque odit',
				start: '2016-12-12T10:30:00',
				end: '2016-12-12T12:30:00'
			},
			{
				title: 'ipsam incidunt natus',
				start: '2016-12-12T12:00:00'
			},
			{
				title: 'Nihil eaque odit',
				start: '2016-12-12T14:30:00'
			},
			{
				title: 'debitis ipsum',
				start: '2016-12-12T17:30:00'
			},
			{
				title: 'ipsam incidunt natus',
				start: '2016-12-12T20:00:00'
			},
			{
				title: 'debitis ipsum',
				start: '2016-12-13T07:00:00'
			}
		];

		$(document).ready(function () {

			// calendar
			$('#calendar').fullCalendar({
				defaultDate: '2016-12-12',
				// height: 350,
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				events: events
			});

			// list view 
			var calendarContainer = document.querySelector('#calendar');
			var height = calendarContainer ? calendarContainer.clientHeight : 650;

			$('#list-view').fullCalendar({
				height: height,
				// header: {
				// 	left: 'prev,next today',
				// 	center: 'title',
				// 	right: 'listDay,listWeek,month'
				// },

				// // customize the button names,
				// // otherwise they'd all just say "list"
				// views: {
				// 	listDay: { buttonText: 'list day' },
				// 	listWeek: { buttonText: 'list week' }
				// },

				defaultView: 'listWeek',
				defaultDate: '2016-12-12',
				// navLinks: true, // can click day/week names to navigate views
				// editable: true,
				eventLimit: true, // allow "more" link when too many events
				events: events
			});

		});

	}]);