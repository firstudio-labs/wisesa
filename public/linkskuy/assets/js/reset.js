'use strict';

// ===== REQUEST OTP FUNCTIONALITY =====

// Request OTP form submission
document.addEventListener('DOMContentLoaded', function() {
  const requestOtpForm = document.getElementById('request-otp-form');
  
  if (requestOtpForm) {
    requestOtpForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const whatsapp = document.getElementById('whatsapp').value;
      
      // Basic validation
      if (!whatsapp) {
        showNotification('Nomor WhatsApp harus diisi!', 'error');
        return;
      }
      
      // WhatsApp validation
      if (!isValidWhatsApp(whatsapp)) {
        showNotification('Format nomor WhatsApp tidak valid!', 'error');
        return;
      }
      
      // Simulate OTP request process
      const requestBtn = this.querySelector('button[type="submit"]');
      const originalText = requestBtn.innerHTML;
      requestBtn.innerHTML = '<ion-icon name="hourglass-outline"></ion-icon> <span>Mengirim OTP...</span>';
      requestBtn.disabled = true;
      
      // Simulate API call delay
      setTimeout(() => {
        // For demo purposes, accept any valid WhatsApp number
        showNotification('OTP berhasil dikirim ke WhatsApp Anda!', 'success');
        
        // Store WhatsApp number in localStorage for next step
        localStorage.setItem('resetWhatsApp', whatsapp);
        
        // Redirect to OTP verification page
        setTimeout(() => {
          window.location.href = 'verifotp.html';
        }, 1500);
      }, 2000);
    });
  }
});

// ===== VERIFY OTP FUNCTIONALITY =====

// Verify OTP form submission
document.addEventListener('DOMContentLoaded', function() {
  const verifyOtpForm = document.getElementById('verify-otp-form');
  
  if (verifyOtpForm) {
    verifyOtpForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const otpCode = document.getElementById('otp-code').value;
      
      // Basic validation
      if (!otpCode) {
        showNotification('Kode OTP harus diisi!', 'error');
        return;
      }
      
      // OTP validation (6 digits)
      if (!/^\d{6}$/.test(otpCode)) {
        showNotification('Kode OTP harus 6 digit angka!', 'error');
        return;
      }
      
      // Simulate OTP verification process
      const verifyBtn = this.querySelector('button[type="submit"]');
      const originalText = verifyBtn.innerHTML;
      verifyBtn.innerHTML = '<ion-icon name="hourglass-outline"></ion-icon> <span>Memverifikasi...</span>';
      verifyBtn.disabled = true;
      
      // Simulate API call delay
      setTimeout(() => {
        // For demo purposes, accept any 6-digit OTP
        showNotification('OTP berhasil diverifikasi! Redirecting...', 'success');
        
        // Store OTP verification status
        localStorage.setItem('otpVerified', 'true');
        
        // Redirect to reset password page
        setTimeout(() => {
          window.location.href = 'resetpassword.html';
        }, 1500);
      }, 2000);
    });
  }
});

// ===== RESET PASSWORD FUNCTIONALITY =====

// Reset password form submission
document.addEventListener('DOMContentLoaded', function() {
  const resetPasswordForm = document.getElementById('reset-password-form');
  
  if (resetPasswordForm) {
    resetPasswordForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const newPassword = document.getElementById('new-password').value;
      const confirmNewPassword = document.getElementById('confirm-new-password').value;
      
      // Basic validation
      if (!newPassword || !confirmNewPassword) {
        showNotification('Semua field harus diisi!', 'error');
        return;
      }
      
      // Password validation
      if (newPassword.length < 8) {
        showNotification('Password minimal 8 karakter!', 'error');
        return;
      }
      
      if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(newPassword)) {
        showNotification('Password harus mengandung huruf besar, huruf kecil, dan angka!', 'error');
        return;
      }
      
      // Confirm password validation
      if (newPassword !== confirmNewPassword) {
        showNotification('Konfirmasi password tidak cocok!', 'error');
        return;
      }
      
      // Check if OTP was verified
      const otpVerified = localStorage.getItem('otpVerified');
      if (otpVerified !== 'true') {
        showNotification('OTP belum diverifikasi! Silakan verifikasi OTP terlebih dahulu.', 'error');
        return;
      }
      
      // Simulate password reset process
      const resetBtn = this.querySelector('button[type="submit"]');
      const originalText = resetBtn.innerHTML;
      resetBtn.innerHTML = '<ion-icon name="hourglass-outline"></ion-icon> <span>Mereset password...</span>';
      resetBtn.disabled = true;
      
      // Simulate API call delay
      setTimeout(() => {
        // For demo purposes, accept any valid password
        showNotification('Password berhasil direset! Redirecting ke login...', 'success');
        
        // Clear reset data from localStorage
        localStorage.removeItem('resetWhatsApp');
        localStorage.removeItem('otpVerified');
        
        // Redirect to login page
        setTimeout(() => {
          window.location.href = '../auth/login.html';
        }, 2000);
      }, 2000);
    });
  }
  
  // Real-time password strength indicator
  const newPasswordInput = document.getElementById('new-password');
  const confirmNewPasswordInput = document.getElementById('confirm-new-password');
  
  if (newPasswordInput) {
    newPasswordInput.addEventListener('input', function() {
      const password = this.value;
      const strength = getPasswordStrength(password);
      updatePasswordStrengthIndicator(strength);
    });
  }
  
  if (confirmNewPasswordInput) {
    confirmNewPasswordInput.addEventListener('input', function() {
      const password = document.getElementById('new-password').value;
      const confirmPassword = this.value;
      
      if (confirmPassword && password !== confirmPassword) {
        this.style.borderColor = '#ef4444';
        showPasswordMismatchError();
      } else {
        this.style.borderColor = '#22c44d';
        hidePasswordMismatchError();
      }
    });
  }
  
  // Check if user came from OTP verification
  // checkOtpVerification();
});

// ===== HELPER FUNCTIONS =====

// WhatsApp validation function
function isValidWhatsApp(whatsapp) {
  // Basic WhatsApp validation for Indonesian numbers
  const whatsappRegex = /^(\+62|62|0)8[1-9][0-9]{6,9}$/;
  return whatsappRegex.test(whatsapp.replace(/\s|-/g, ''));
}

// Password strength checker
function getPasswordStrength(password) {
  let score = 0;
  
  if (password.length >= 8) score++;
  if (password.length >= 12) score++;
  if (/[a-z]/.test(password)) score++;
  if (/[A-Z]/.test(password)) score++;
  if (/\d/.test(password)) score++;
  if (/[^A-Za-z0-9]/.test(password)) score++;
  
  if (score <= 2) return 'weak';
  if (score <= 4) return 'medium';
  return 'strong';
}

// Update password strength indicator
function updatePasswordStrengthIndicator(strength) {
  let existingIndicator = document.querySelector('.password-strength');
  
  if (!existingIndicator) {
    existingIndicator = document.createElement('div');
    existingIndicator.className = 'password-strength';
    existingIndicator.style.cssText = `
      margin-top: 8px;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      gap: 8px;
    `;
    
    const passwordGroup = document.getElementById('new-password').closest('.form-group');
    passwordGroup.appendChild(existingIndicator);
  }
  
  const strengthText = {
    weak: 'Lemah',
    medium: 'Sedang',
    strong: 'Kuat'
  };
  
  const strengthColor = {
    weak: '#ef4444',
    medium: '#f59e0b',
    strong: '#22c44d'
  };
  
  existingIndicator.innerHTML = `
    <div style="width: 60px; height: 4px; background: #e5e7eb; border-radius: 2px; overflow: hidden;">
      <div style="width: ${strength === 'weak' ? '33%' : strength === 'medium' ? '66%' : '100%'}; height: 100%; background: ${strengthColor[strength]}; transition: all 0.3s ease;"></div>
    </div>
    <span style="color: ${strengthColor[strength]}; font-weight: 600;">${strengthText[strength]}</span>
  `;
}

// Show password mismatch error
function showPasswordMismatchError() {
  let existingError = document.querySelector('.password-mismatch-error');
  
  if (!existingError) {
    existingError = document.createElement('div');
    existingError.className = 'password-mismatch-error';
    existingError.style.cssText = `
      color: #ef4444;
      font-size: 0.85rem;
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 6px;
    `;
    existingError.innerHTML = '<ion-icon name="close-circle-outline"></ion-icon> Password tidak cocok';
    
    const confirmPasswordGroup = document.getElementById('confirm-new-password').closest('.form-group');
    confirmPasswordGroup.appendChild(existingError);
  }
}

// Hide password mismatch error
function hidePasswordMismatchError() {
  const existingError = document.querySelector('.password-mismatch-error');
  if (existingError) {
    existingError.remove();
  }
}

// ===== PASSWORD TOGGLE FUNCTIONALITY =====

// Password toggle functionality for show/hide password
document.addEventListener('DOMContentLoaded', function() {
  console.log('DOM loaded, looking for password toggles...');
  
  const passwordToggles = document.querySelectorAll('[data-password-toggle]');
  console.log('Found password toggles:', passwordToggles.length);
  
  passwordToggles.forEach((toggle, index) => {
    console.log(`Setting up toggle ${index}:`, toggle);
    
    toggle.addEventListener('click', function(e) {
      e.preventDefault();
      console.log('Toggle clicked:', this);
      
      const passwordInput = this.previousElementSibling;
      console.log('Password input:', passwordInput);
      
      if (!passwordInput || passwordInput.type === undefined) {
        console.error('Password input not found or invalid');
        return;
      }
      
      const icon = this.querySelector('ion-icon');
      console.log('Icon element:', icon);
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        if (icon) {
          icon.setAttribute('name', 'eye-off-outline');
        }
        this.setAttribute('aria-label', 'Hide password');
        console.log('Password shown');
      } else {
        passwordInput.type = 'password';
        if (icon) {
          icon.setAttribute('name', 'eye-outline');
        }
        this.setAttribute('aria-label', 'Show password');
        console.log('Password hidden');
      }
    });
    
    // Add hover effect
    toggle.addEventListener('mouseenter', function() {
      this.style.color = 'rgb(37, 150, 190)';
      this.style.background = 'rgba(37, 150, 190, 0.1)';
    });
    
    toggle.addEventListener('mouseleave', function() {
      this.style.color = '#6c757d';
      this.style.background = 'none';
    });
  });
});

// ===== NOTIFICATION SYSTEM =====

// Notification system
function showNotification(message, type = 'info') {
  // Remove existing notifications
  const existingNotifications = document.querySelectorAll('.notification');
  existingNotifications.forEach(notification => notification.remove());
  
  // Create notification element
  const notification = document.createElement('div');
  notification.className = `notification notification-${type}`;
  notification.innerHTML = `
    <div class="notification-content">
      <ion-icon name="${getNotificationIcon(type)}"></ion-icon>
      <span>${message}</span>
    </div>
    <button class="notification-close" onclick="this.parentElement.remove()">
      <ion-icon name="close-outline"></ion-icon>
    </button>
  `;
  
  // Add notification styles
  notification.style.cssText = `
    position: fixed;
    top: 20px;
    right: 20px;
    background: ${getNotificationColor(type)};
    color: white;
    padding: 16px 20px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    z-index: 10000;
    display: flex;
    align-items: center;
    gap: 12px;
    max-width: 400px;
    animation: slideInRight 0.3s ease;
  `;
  
  // Add notification content styles
  const content = notification.querySelector('.notification-content');
  content.style.cssText = `
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
  `;
  
  // Add notification close button styles
  const closeBtn = notification.querySelector('.notification-close');
  closeBtn.style.cssText = `
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: background 0.3s ease;
  `;
  
  closeBtn.addEventListener('mouseenter', function() {
    this.style.background = 'rgba(255,255,255,0.2)';
  });
  
  closeBtn.addEventListener('mouseleave', function() {
    this.style.background = 'none';
  });
  
  // Add slide in animation
  const style = document.createElement('style');
  style.textContent = `
    @keyframes slideInRight {
      from {
        transform: translateX(100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
  `;
  document.head.appendChild(style);
  
  // Add to page
  document.body.appendChild(notification);
  
  // Auto remove after 5 seconds
  setTimeout(() => {
    if (notification.parentElement) {
      notification.remove();
    }
  }, 5000);
}

// Helper functions for notifications
function getNotificationIcon(type) {
  switch (type) {
    case 'success': return 'checkmark-circle-outline';
    case 'error': return 'close-circle-outline';
    case 'warning': return 'warning-outline';
    default: return 'information-circle-outline';
  }
}

function getNotificationColor(type) {
  switch (type) {
    case 'success': return 'linear-gradient(135deg, #22c44d, #16a34a)';
    case 'error': return 'linear-gradient(135deg, #ef4444, #dc2626)';
    case 'warning': return 'linear-gradient(135deg, #f59e0b, #d97706)';
    default: return 'linear-gradient(135deg, #667eea, #764ba2)';
  }
}
