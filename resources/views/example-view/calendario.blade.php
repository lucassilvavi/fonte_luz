@extends('layouts.principal')

@section('title','Exemplo de Calendário')
@section('title-form','Calendário')

@section('breadcrumb')
    <li><a href="index.html">Home</a></li>
    <li><a>Forms</a></li>
    <li class="active"><strong>Calendário</strong></li>
@endsection


@section('style')
    <link href="{{asset("assets/vendor/fullcalendar/dist/fullcalendar.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/fullcalendar/dist/fullcalendar.print.css")}}" rel="stylesheet" media="print">
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id='calendar'></div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{asset("assets/vendor/moment/moment.js")}}"></script>
    <script src="{{asset("assets/vendor/fullcalendar/dist/fullcalendar.min.js")}}"></script>
    <script src="{{asset("assets/vendor/fullcalendar/dist/locale-all.js")}}"></script>
    <script>

        $(document).ready(function() {
            var initialLocaleCode = "pt";

            $('#calendar').fullCalendar({
                defaultDate: '2016-12-12',
                locale: initialLocaleCode,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    {
                        title: 'All Day Event',
                        start: '2016-12-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2016-12-07',
                        end: '2016-12-10'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2016-12-09T16:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2016-12-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2016-12-11',
                        end: '2016-12-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2016-12-12T10:30:00',
                        end: '2016-12-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2016-12-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2016-12-12T14:30:00'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2016-12-12T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2016-12-12T20:00:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2016-12-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2016-12-28'
                    }
                ]
            });

        });

    </script>
@endsection