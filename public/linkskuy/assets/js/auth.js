'use strict';

// Global function for handling photo change - must be defined before HTML loads
window.handlePhotoChange = function(input) {
  console.log('Photo change triggered!'); // Debug log
  
  // Check if input has files
  if (!input.files || input.files.length === 0) {
    console.log('No files selected');
    return;
  }
  
  const file = input.files[0];
  console.log('File selected:', file.name, file.type, file.size);
  
  // File size validation (2MB)
  if (file.size > 2 * 1024 * 1024) {
    console.log('Ukuran file terlalu besar! Maksimal 2MB.');
    return;
  }
  
  // Check if it's an image
  if (!file.type.startsWith('image/')) {
    console.log('Pilih file gambar yang valid! Format: JPG, PNG, GIF');
    return;
  }
  
  // Method 1: Using URL.createObjectURL (faster preview)
  try {
    const profilePhotoImg = document.getElementById('profile-photo-img');
    console.log('Profile photo img element:', profilePhotoImg);
    
    if (profilePhotoImg) {
      // Create object URL for immediate preview
      const objectURL = URL.createObjectURL(file);
      profilePhotoImg.src = objectURL;
      console.log('Photo preview updated with object URL!');
      
      // Clean up the object URL after a delay
      setTimeout(() => {
        URL.revokeObjectURL(objectURL);
      }, 1000);
      
      // Show success message
      setTimeout(() => {
        console.log('Foto profil berhasil diperbarui!');
      }, 100);
    } else {
      console.error('Profile photo img element not found!');
      console.log('Error: Elemen foto profil tidak ditemukan!');
    }
  } catch (error) {
    console.error('Error with object URL method:', error);
    
    // Fallback to FileReader method
    console.log('Falling back to FileReader method...');
    const reader = new FileReader();
    
    reader.onload = function(e) {
      console.log('FileReader onload triggered');
      
      // Note: profilePhotoImg already declared above
      if (profilePhotoImg) {
        profilePhotoImg.src = e.target.result;
        console.log('Photo src updated with FileReader!');
        
        setTimeout(() => {
          console.log('Foto profil berhasil diperbarui!');
        }, 100);
      }
    };
    
    reader.onerror = function(e) {
      console.error('FileReader error:', e);
      console.log('Error membaca file!');
    };
    
    reader.readAsDataURL(file);
  }
};

// Profile Page Functions
document.addEventListener('DOMContentLoaded', function() {
  // Photo upload preview
  const profilePhotoInput = document.getElementById('profile-photo');
  const profilePhotoPreview = document.getElementById('profile-photo-preview');
  
  if (profilePhotoInput && profilePhotoPreview) {
    profilePhotoInput.addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        if (file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function(e) {
            profilePhotoPreview.src = e.target.result;
          };
          reader.readAsDataURL(file);
        } else {
          console.log('Silakan pilih file gambar yang valid!');
        }
      }
    });
  }

  // Password toggle visibility - Improved version
  function setupPasswordToggles() {
    const passwordToggles = document.querySelectorAll('[data-password-toggle]');
    console.log('Setting up password toggles. Found:', passwordToggles.length);
    
    passwordToggles.forEach((toggle, index) => {
      // Remove any existing event listeners
      toggle.replaceWith(toggle.cloneNode(true));
      
      // Get the fresh toggle element
      const freshToggle = document.querySelectorAll('[data-password-toggle]')[index];
      
      freshToggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const passwordInput = this.parentElement.querySelector('input[type="password"], input[type="text"]');
        const icon = this.querySelector('ion-icon');
        
        if (passwordInput && icon) {
          if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.name = 'eye-off-outline';
            console.log('Password unhidden for:', passwordInput.id);
          } else {
            passwordInput.type = 'password';
            icon.name = 'eye-outline';
            console.log('Password hidden for:', passwordInput.id);
          }
        } else {
          console.error('Password input or icon not found');
        }
      });
      
      console.log(`Toggle ${index + 1} setup complete`);
    });
  }
  
  // Call the function
  setupPasswordToggles();

  // Profile form submission
  const profileForm = document.querySelector('.profile-form');
  if (profileForm) {
    profileForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const username = document.getElementById('username').value;
      const email = document.getElementById('email').value;
      const phone = document.getElementById('phone').value;
      
      // Basic validation
      if (!username || !email || !phone) {
        console.log('Semua field harus diisi!');
        return;
      }
      
      if (!isValidEmail(email)) {
        console.log('Format email tidak valid!');
        return;
      }
      
      if (!isValidPhone(phone)) {
        console.log('Format nomor HP tidak valid!');
        return;
      }
      
      // Simulate saving
      const saveBtn = this.querySelector('.save-btn');
      const originalText = saveBtn.innerHTML;
      saveBtn.innerHTML = '<ion-icon name="checkmark-outline"></ion-icon> Menyimpan...';
      saveBtn.disabled = true;
      
      setTimeout(() => {
        saveBtn.innerHTML = '<ion-icon name="checkmark-outline"></ion-icon> Tersimpan!';
        setTimeout(() => {
          saveBtn.innerHTML = originalText;
          saveBtn.disabled = false;
        }, 2000);
      }, 1500);
      
      console.log('Profil berhasil diperbarui!');
    });
  }

  // Security form submission
  const securityForm = document.querySelector('.security-form');
  if (securityForm) {
    securityForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const currentPassword = document.getElementById('current-password').value;
      const newPassword = document.getElementById('new-password').value;
      const confirmPassword = document.getElementById('confirm-password').value;
      const newUsername = document.getElementById('new-username').value;
      
      // Basic validation
      if (!currentPassword) {
        console.log('Password saat ini harus diisi!');
        return;
      }
      
      if (newPassword && newPassword.length < 6) {
        console.log('Password baru minimal 6 karakter!');
        return;
      }
      
      if (newPassword && newPassword !== confirmPassword) {
        console.log('Konfirmasi password tidak cocok!');
        return;
      }
      
      if (newUsername && newUsername.length < 3) {
        console.log('Username baru minimal 3 karakter!');
        return;
      }
      
      // Simulate updating
      const updateBtn = this.querySelector('.update-security-btn');
      const originalText = updateBtn.innerHTML;
      updateBtn.innerHTML = '<ion-icon name="checkmark-outline"></ion-icon> Mengupdate...';
      updateBtn.disabled = true;
      
      setTimeout(() => {
        updateBtn.innerHTML = '<ion-icon name="checkmark-outline"></ion-icon> Terupdate!';
        setTimeout(() => {
          updateBtn.innerHTML = originalText;
          updateBtn.disabled = false;
          
          // Clear password fields
          document.getElementById('current-password').value = '';
          document.getElementById('new-password').value = '';
          document.getElementById('confirm-password').value = '';
          
          // Update current username if changed
          if (newUsername) {
            document.getElementById('current-username').value = newUsername;
            document.getElementById('new-username').value = '';
          }
        }, 2000);
      }, 1500);
      
      console.log('Keamanan akun berhasil diperbarui!');
    });
  }

  // Profile photo preview click functionality
  // Note: profilePhotoPreview and profilePhotoInput already declared above
  
  console.log('Looking for elements:', { 
    preview: profilePhotoPreview, 
    input: profilePhotoInput 
  }); // Debug log
  
  if (profilePhotoPreview && profilePhotoInput) {
    console.log('Profile photo elements found!'); // Debug log
    
    // Add click event to the preview container
    profilePhotoPreview.onclick = function(e) {
      e.preventDefault();
      e.stopPropagation();
      console.log('Photo preview clicked!'); // Debug log
      profilePhotoInput.click();
    };
    
    console.log('Event listeners added successfully!'); // Debug log
  } else {
    console.log('Profile photo elements not found:', { 
      preview: profilePhotoPreview, 
      input: profilePhotoInput 
    }); // Debug log
  }
  
  // Profile form submission (alternative version)
  const profileFormAlt = document.getElementById('profile-form');
  if (profileFormAlt) {
    profileFormAlt.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const fullname = document.getElementById('fullname').value;
      // Note: username, email, phone already declared above
      const oldPassword = document.getElementById('old-password').value;
      // Note: newPassword, confirmPassword already declared above
      
      // Basic validation
      if (!fullname || !username || !email || !phone) {
        console.log('Semua field wajib diisi!');
        return;
      }
      
      if (!isValidEmail(email)) {
        console.log('Format email tidak valid!');
        return;
      }
      
      if (!isValidPhone(phone)) {
        console.log('Format nomor HP tidak valid!');
        return;
      }
      
      // Password validation if changing password
      if (oldPassword || newPassword || confirmPassword) {
        if (!oldPassword) {
          console.log('Password lama harus diisi jika ingin mengganti password!');
          return;
        }
        
        if (!newPassword) {
          console.log('Password baru harus diisi jika ingin mengganti password!');
          return;
        }
        
        if (newPassword.length < 8) {
          console.log('Password baru minimal 8 karakter!');
          return;
        }
        
        if (newPassword !== confirmPassword) {
          console.log('Konfirmasi password tidak cocok!');
          return;
        }
      }
      
      // Simulate saving
      const saveBtn = document.querySelector('.save-profile-btn');
      const originalText = saveBtn.innerHTML;
      saveBtn.innerHTML = '<ion-icon name="checkmark-outline"></ion-icon> Menyimpan...';
      saveBtn.disabled = true;
      
      setTimeout(() => {
        saveBtn.innerHTML = '<ion-icon name="checkmark-outline"></ion-icon> Tersimpan!';
        setTimeout(() => {
          saveBtn.innerHTML = originalText;
          saveBtn.disabled = false;
        }, 2000);
      }, 1500);
      
      console.log('Profil berhasil diperbarui!');
    });
  }
  
  // Reset form functionality
  const resetBtn = document.getElementById('reset-form');
  if (resetBtn) {
    resetBtn.addEventListener('click', function() {
      profileFormAlt.reset();
      // Reset photo to default
      // Note: profilePhotoImg already declared above
      if (profilePhotoImg) {
        profilePhotoImg.src = './assets/images/my-avatar.png';
      }
      console.log('Form berhasil direset!');
    });
  }
  
  // Password toggle functionality
  const passwordToggles = document.querySelectorAll('.password-toggle');
  passwordToggles.forEach(toggle => {
    toggle.addEventListener('click', function() {
      const targetId = this.getAttribute('data-target');
      const targetInput = document.getElementById(targetId);
      const icon = this.querySelector('ion-icon');
      
      if (targetInput.type === 'password') {
        targetInput.type = 'text';
        icon.setAttribute('name', 'eye-off-outline');
      } else {
        targetInput.type = 'password';
        icon.setAttribute('name', 'eye-outline');
      }
    });
  });
});

// Helper functions
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function isValidPhone(phone) {
  // Basic phone validation for Indonesian numbers
  const phoneRegex = /^(\+62|62|0)8[1-9][0-9]{6,9}$/;
  return phoneRegex.test(phone.replace(/\s|-/g, ''));
}

// ===== LOGIN FORM FUNCTIONALITY =====

// Login form submission
document.addEventListener('DOMContentLoaded', function() {
  const loginForm = document.getElementById('login-form');
  const googleLoginBtn = document.getElementById('google-login');
  
  if (loginForm) {
    loginForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;
      const rememberMe = document.getElementById('remember-me').checked;
      
      // Basic validation
      if (!username || !password) {
        showNotification('Username dan password harus diisi!', 'error');
        return;
      }
      
      // Simulate login process
      const loginBtn = this.querySelector('.login-btn');
      const originalText = loginBtn.innerHTML;
      loginBtn.innerHTML = '<ion-icon name="hourglass-outline"></ion-icon> <span>Memproses...</span>';
      loginBtn.disabled = true;
      
      // Simulate API call delay
      setTimeout(() => {
        // For demo purposes, accept any non-empty credentials
        if (username.trim() && password.trim()) {
          showNotification('Login berhasil! Redirecting...', 'success');
          
          // Store remember me preference
          if (rememberMe) {
            localStorage.setItem('rememberMe', 'true');
            localStorage.setItem('username', username);
          } else {
            localStorage.removeItem('rememberMe');
            localStorage.removeItem('username');
          }
          
          // Redirect to profile page after successful login
          setTimeout(() => {
            window.location.href = '../profil.html';
          }, 1500);
        } else {
          showNotification('Username atau password salah!', 'error');
          loginBtn.innerHTML = originalText;
          loginBtn.disabled = false;
        }
      }, 2000);
    });
  }
  
  // Google login functionality
  if (googleLoginBtn) {
    googleLoginBtn.addEventListener('click', function() {
      // Simulate Google OAuth process
      const originalText = this.innerHTML;
      this.innerHTML = '<ion-icon name="hourglass-outline"></ion-icon> <span>Memproses Google...</span>';
      this.disabled = true;
      
      // Simulate OAuth delay
      setTimeout(() => {
        showNotification('Login dengan Google berhasil! Redirecting...', 'success');
        
        // Redirect to profile page after successful Google login
        setTimeout(() => {
          window.location.href = '../profil.html';
        }, 1500);
      }, 2500);
    });
  }
  
  // Check for remembered user
  checkRememberedUser();
});

// Check if user was previously remembered
function checkRememberedUser() {
  const remembered = localStorage.getItem('rememberMe');
  const savedUsername = localStorage.getItem('username');
  
  if (remembered === 'true' && savedUsername) {
    const usernameInput = document.getElementById('username');
    const rememberMeCheckbox = document.getElementById('remember-me');
    
    if (usernameInput && rememberMeCheckbox) {
      usernameInput.value = savedUsername;
      rememberMeCheckbox.checked = true;
    }
  }
}

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

// ===== REGISTER FORM FUNCTIONALITY =====

// Register form submission
document.addEventListener('DOMContentLoaded', function() {
  const registerForm = document.getElementById('register-form');
  const googleRegisterBtn = document.querySelector('button[type="button"]');
  
  if (registerForm) {
    registerForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const fullname = document.getElementById('fullname').value;
      const username = document.getElementById('username').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm-password').value;
      const agreeTerms = document.getElementById('agree-terms').checked;
      
      // Basic validation
      if (!fullname || !username || !email || !password || !confirmPassword) {
        showNotification('Semua field harus diisi!', 'error');
        return;
      }
      
      if (!agreeTerms) {
        showNotification('Anda harus menyetujui Syarat & Ketentuan!', 'error');
        return;
      }
      
      // Username validation
      if (username.length < 3) {
        showNotification('Username minimal 3 karakter!', 'error');
        return;
      }
      
      if (!/^[a-zA-Z0-9_]+$/.test(username)) {
        showNotification('Username hanya boleh berisi huruf, angka, dan underscore!', 'error');
        return;
      }
      
      // Email validation
      if (!isValidEmail(email)) {
        showNotification('Format email tidak valid!', 'error');
        return;
      }
      
      // Password validation
      if (password.length < 8) {
        showNotification('Password minimal 8 karakter!', 'error');
        return;
      }
      
      if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(password)) {
        showNotification('Password harus mengandung huruf besar, huruf kecil, dan angka!', 'error');
        return;
      }
      
      // Confirm password validation
      if (password !== confirmPassword) {
        showNotification('Konfirmasi password tidak cocok!', 'error');
        return;
      }
      
      // Simulate registration process
      const registerBtn = this.querySelector('button[type="submit"]');
      const originalText = registerBtn.innerHTML;
      registerBtn.innerHTML = '<ion-icon name="hourglass-outline"></ion-icon> <span>Memproses...</span>';
      registerBtn.disabled = true;
      
      // Simulate API call delay
      setTimeout(() => {
        // For demo purposes, accept any valid input
        showNotification('Registrasi berhasil! Redirecting ke login...', 'success');
        
        // Store user data in localStorage (for demo purposes)
        const userData = {
          fullname: fullname,
          username: username,
          email: email,
          registeredAt: new Date().toISOString()
        };
        localStorage.setItem('userData', JSON.stringify(userData));
        
        // Redirect to login page after successful registration
        setTimeout(() => {
          window.location.href = 'login.html';
        }, 2000);
      }, 2500);
    });
  }
  
  // Google register functionality
  if (googleRegisterBtn && googleRegisterBtn.textContent.includes('Google')) {
    googleRegisterBtn.addEventListener('click', function() {
      // Simulate Google OAuth process
      const originalText = this.innerHTML;
      this.innerHTML = '<ion-icon name="hourglass-outline"></ion-icon> <span>Memproses Google...</span>';
      this.disabled = true;
      
      // Simulate OAuth delay
      setTimeout(() => {
        showNotification('Registrasi dengan Google berhasil! Redirecting...', 'success');
        
        // Redirect to profile page after successful Google registration
        setTimeout(() => {
          window.location.href = '../profil.html';
        }, 2000);
      }, 3000);
    });
  }
  
  // Real-time password strength indicator
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('confirm-password');
  
  if (passwordInput) {
    passwordInput.addEventListener('input', function() {
      const password = this.value;
      const strength = getPasswordStrength(password);
      updatePasswordStrengthIndicator(strength);
    });
  }
  
  if (confirmPasswordInput) {
    confirmPasswordInput.addEventListener('input', function() {
      const password = document.getElementById('password').value;
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
  
  // Username availability check (simulated)
  const usernameInput = document.getElementById('username');
  if (usernameInput) {
    usernameInput.addEventListener('blur', function() {
      const username = this.value;
      if (username.length >= 3) {
        checkUsernameAvailability(username);
      }
    });
  }
});

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
    
    const passwordGroup = document.getElementById('password').closest('.form-group');
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
    
    const confirmPasswordGroup = document.getElementById('confirm-password').closest('.form-group');
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

// Check username availability (simulated)
function checkUsernameAvailability(username) {
  // Simulate API call
  setTimeout(() => {
    // For demo purposes, consider usernames with 'admin', 'test', 'user' as taken
    const takenUsernames = ['admin', 'test', 'user', 'admin123', 'test123'];
    const isAvailable = !takenUsernames.includes(username.toLowerCase());
    
    if (!isAvailable) {
      showNotification(`Username "${username}" sudah digunakan!`, 'warning');
    }
  }, 1000);
}

// ===== GOOGLE REGISTRATION COMPLETION FUNCTIONALITY =====

// Complete Google registration form submission
document.addEventListener('DOMContentLoaded', function() {
  const completeRegistrationForm = document.getElementById('complete-registration-form');
  
  if (completeRegistrationForm) {
    completeRegistrationForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const username = document.getElementById('username').value;
      const whatsapp = document.getElementById('whatsapp').value;
      const agreeTerms = document.getElementById('agree-terms').checked;
      
      // Basic validation
      if (!username || !whatsapp) {
        showNotification('Username dan nomor WhatsApp harus diisi!', 'error');
        return;
      }
      
      if (!agreeTerms) {
        showNotification('Anda harus menyetujui Syarat & Ketentuan!', 'error');
        return;
      }
      
      // Username validation
      if (username.length < 3) {
        showNotification('Username minimal 3 karakter!', 'error');
        return;
      }
      
      if (!/^[a-zA-Z0-9_]+$/.test(username)) {
        showNotification('Username hanya boleh berisi huruf, angka, dan underscore!', 'error');
        return;
      }
      
      // WhatsApp validation
      if (!isValidWhatsApp(whatsapp)) {
        showNotification('Format nomor WhatsApp tidak valid!', 'error');
        return;
      }
      
      // Simulate completion process
      const completeBtn = this.querySelector('button[type="submit"]');
      const originalText = completeBtn.innerHTML;
      completeBtn.innerHTML = '<ion-icon name="hourglass-outline"></ion-icon> <span>Menyelesaikan...</span>';
      completeBtn.disabled = true;
      
      // Simulate API call delay
      setTimeout(() => {
        // For demo purposes, accept any valid input
        showNotification('Pendaftaran berhasil diselesaikan! Redirecting ke profil...', 'success');
        
        // Store completed user data in localStorage (for demo purposes)
        const userData = {
          username: username,
          whatsapp: whatsapp,
          googleAccount: true,
          completedAt: new Date().toISOString()
        };
        localStorage.setItem('userData', JSON.stringify(userData));
        
        // Redirect to profile page after successful completion
        setTimeout(() => {
          window.location.href = '../profil.html';
        }, 2000);
      }, 2000);
    });
  }
  
  // Real-time username availability check
  const usernameInput = document.getElementById('username');
  if (usernameInput) {
    usernameInput.addEventListener('blur', function() {
      const username = this.value;
      if (username.length >= 3) {
        checkUsernameAvailability(username);
      }
    });
  }
  
  // Real-time WhatsApp format validation
  const whatsappInput = document.getElementById('whatsapp');
  if (whatsappInput) {
    whatsappInput.addEventListener('input', function() {
      const whatsapp = this.value;
      if (whatsapp) {
        validateWhatsAppFormat(whatsapp, this);
      }
    });
  }
});

// WhatsApp validation function
function isValidWhatsApp(whatsapp) {
  // Basic WhatsApp validation for Indonesian numbers
  const whatsappRegex = /^(\+62|62|0)8[1-9][0-9]{6,9}$/;
  return whatsappRegex.test(whatsapp.replace(/\s|-/g, ''));
}

// Validate WhatsApp format in real-time
function validateWhatsAppFormat(whatsapp, inputElement) {
  if (isValidWhatsApp(whatsapp)) {
    inputElement.style.borderColor = '#22c44d';
    hideWhatsAppError();
  } else {
    inputElement.style.borderColor = '#ef4444';
    showWhatsAppError();
  }
}

// Show WhatsApp format error
function showWhatsAppError() {
  let existingError = document.querySelector('.whatsapp-format-error');
  
  if (!existingError) {
    existingError = document.createElement('div');
    existingError.className = 'whatsapp-format-error';
    existingError.style.cssText = `
      color: #ef4444;
      font-size: 0.85rem;
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 6px;
    `;
    existingError.innerHTML = '<ion-icon name="close-circle-outline"></ion-icon> Format nomor WhatsApp tidak valid';
    
    const whatsappGroup = document.getElementById('whatsapp').closest('.form-group');
    whatsappGroup.appendChild(existingError);
  }
}

// Hide WhatsApp format error
function hideWhatsAppError() {
  const existingError = document.querySelector('.whatsapp-format-error');
  if (existingError) {
    existingError.remove();
  }
}
