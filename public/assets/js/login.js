const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    
    togglePassword.addEventListener('click', function() {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('bi-eye');
      this.classList.toggle('bi-eye-slash');
    });
    

    // انیمیشن بارگذاری صفحه
    window.addEventListener('load', function() {
      setTimeout(function() {
        const preloader = document.getElementById('preloader');
        const loginForm = document.getElementById('loginForm');
        
        preloader.style.opacity = '0';
        loginForm.style.animation = 'fadeIn 1s ease-out, pulse 8s ease-in-out infinite';
        
        setTimeout(function() {
          preloader.style.display = 'none';
        }, 600);
      }, 1200);
    });