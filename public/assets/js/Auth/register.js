const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function() {
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  this.classList.toggle('bi-eye');
  this.classList.toggle('bi-eye-slash');
});

// اعتبارسنجی قدرت رمز عبور
document.getElementById('password').addEventListener('input', function() {
  const strengthBar = document.getElementById('passwordStrength');
  const strength = calculatePasswordStrength(this.value);
  strengthBar.style.width = strength + '%';
  strengthBar.style.background = 
    strength < 30 ? '#ff4d4d' : 
    strength < 70 ? '#ffcc00' : 
    '#4CAF50';
});

function calculatePasswordStrength(password) {
  let strength = 0;
  if (password.length > 0) strength += 10;
  if (password.length >= 8) strength += 20;
  if (/[A-Z]/.test(password)) strength += 20;
  if (/[0-9]/.test(password)) strength += 20;
  if (/[^A-Za-z0-9]/.test(password)) strength += 30;
  return Math.min(strength, 100);
}

// انیمیشن بارگذاری صفحه
window.addEventListener('load', function() {
  setTimeout(function() {
    const preloader = document.getElementById('preloader');
    const registerForm = document.getElementById('registerForm');
    
    preloader.style.opacity = '0';
    registerForm.style.animation = 'fadeIn 1s ease-out, pulse 8s ease-in-out infinite';
    
    setTimeout(function() {
      preloader.style.display = 'none';
    }, 600);
  }, 1200);
});

// اعتبارسنجی فرم