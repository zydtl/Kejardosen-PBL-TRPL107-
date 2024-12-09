


// Script untuk Kalender
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: '2024-11-07',
        locale: 'id', // Bahasa Indonesia
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
            today: 'Hari ini', // Tombol "Today"
            month: 'Bulan',    // Tombol "Month"
            week: 'Minggu',    // Tombol "Week"
            day: 'Hari',       // Tombol "Day"
            list: 'Agenda'     // Tombol "List" (jika digunakan)
        },
        aspectRatio: 1.8,
        events: [
            {
                groupId: '999',
                title: 'Bimbingan ke 3',
                start: '2024-11-09T16:00:00'
            },
            {
                title: 'Bimbingan ke 7',
                start: '2024-11-16T16:30:00',
                end: '2024-11-16T17:00:00'
            },
            {
                title: 'Bimbingan ke 6',
                start: '2024-11-12T10:30:00',
                end: '2024-11-12T12:30:00'
                
                
            }
            
        ]
    });
  
    calendar.render();

    // Panggil fungsi updateNavbarWidth() setelah DOM dimuat
    updateNavbarWidth();

    // Mengubah warna tombol kalender setelah render
    setTimeout(() => {
        const prevButton = document.querySelector('.fc-prev-button');
        const nextButton = document.querySelector('.fc-next-button');
        const todayButton = document.querySelector('.fc-today-button');
        const viewButtons = document.querySelectorAll('.fc-button');

        // Gaya untuk tombol "prev"
        if (prevButton) {
            prevButton.style.backgroundColor = '#d5f5f8'; // Oranye
            prevButton.style.color = 'white';
            prevButton.style.border = 'none';
        }

        // Gaya untuk tombol "next"
        if (nextButton) {
            nextButton.style.backgroundColor = '#d5f5f8'; // Hijau
            nextButton.style.color = 'white';
            nextButton.style.border = 'none';
        }

        // Gaya untuk tombol "Hari Ini"
        if (todayButton) {
            todayButton.style.backgroundColor = '#d5f5f8'; // Biru
            todayButton.style.color = 'white';
            todayButton.style.border = 'none';
        }

        // Gaya untuk semua tombol view (Bulan, Minggu, Hari)
        if (viewButtons) {
            viewButtons.forEach(button => {
                button.style.backgroundColor = '#d5f5f8'; // Abu-abu terang
                button.style.color = '#000'; // Hitam
                button.style.border = '1px solid #ddd'; // Border abu-abu
                button.style.borderRadius = '5px'; // Membuat sudut tombol bulat
            });
        }
       
        
    }, 0);
});
