// اعتبارسنجی شماره همراه
const phoneInput = document.getElementById('phone');
phoneInput.addEventListener('input', function(e) {
  this.value = this.value.replace(/[^0-9]/g, '');
});