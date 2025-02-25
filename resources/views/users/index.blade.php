@extends('layouts.app')

@section('content')
    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/api/record', // 出退勤記録のAPIを指定
                editable: false, // ここでドラッグ＆ドロップなどの編集設定が可能
            });
            calendar.render();
        });
    </script>
@endsection
