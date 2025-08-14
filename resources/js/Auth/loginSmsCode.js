const resendForm = document.getElementById('resendForm');
        const countdown = document.getElementById('countdown');

        function startCountdown() {
            let minutes = 2,
                seconds = 0;

            const timer = setInterval(function() {
                if (seconds === 0) {
                    if (minutes === 0) {
                        clearInterval(timer);
                        countdown.style.display = 'none';
                        resendForm.style.display = 'block';
                        return;
                    }
                    minutes--;
                    seconds = 59;
                } else {
                    seconds--;
                }

                const formattedSeconds = seconds < 10 ? `0${seconds}` : seconds;
                countdown.textContent = `زمان باقیمانده: ${minutes}:${formattedSeconds}`;
            }, 1000);
        }

        startCountdown();