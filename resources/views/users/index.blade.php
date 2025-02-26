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

                // カレンダーに表示する文字の言語設定
                locale: 'ja',

                // 日付から「日」を消す
                dayCellContent: function(arg){
		            return arg.date.getDate();
	            },

                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                
                // 土日の数字の色を変更
                dayCellContent: function(arg) {
                    let dayNumber = arg.date.getDate(); // 日にちを取得
                    let day = arg.date.getDay(); // 曜日を取得（0:日曜, 6:土曜）

                    let color = ''; // デフォルトは黒
                    if (day === 0) {
                        color = 'red'; // 日曜は赤
                    } else if (day === 6) {
                         color = 'blue'; // 土曜は青
                    }

                    return {
                        html: `<span style="color: ${color};">${dayNumber}</span>` // スタイルを適用
                    };
                },

                // 曜日の色を変更する
                dayHeaderContent: function(arg) {
                    let dayName = arg.text; // 曜日のテキスト
                    let color =' #333333'; // デフォルトは黒
                    if (dayName === '日') {
                        color = 'red'; // 日曜日は赤
                    } else if (dayName === '土') {
                        color = 'blue'; // 土曜日は青
                    }

                    return {
                        html: `<span style="color: ${color};">${dayName}</span>` // スタイルを適用
                    };
                },

                dayHeaderDidMount: function(info) {
    info.el.style.textDecoration = 'none';
}


                
            });
            calendar.render();
        });
    </script>
@endsection
