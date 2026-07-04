<?php
$error = isset($_GET['error']) ? urldecode($_GET['error']) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login – Prabhat Electronics</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.34.0/dist/tabler-icons.min.css" />
  <style>
    *, *::before, *::after {
      margin: 0; padding: 0; box-sizing: border-box;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    body { min-height: 100vh; background: #f0f2f5; display: flex; }
 
    /* ── Sidebar ── */
    .sidebar {
      width: 260px; background: #0a1628;
      display: flex; flex-direction: column;
      padding: 2.5rem 1.75rem; flex-shrink: 0; min-height: 100vh;
    }
    .brand { margin-bottom: auto; }
    .brand-name {
      font-size: 24px; font-weight: 700; color: #ffffff;
      letter-spacing: 3px; border-bottom: 2px solid #2563eb;
      padding-bottom: 6px; display: inline-block;
    }
    .brand-sub  { font-size: 10px; letter-spacing: 5px; color: #94a3b8; margin-top: 6px;  display: block; }
    .brand-tag  { font-size: 9px;  letter-spacing: 2px; color: #475569; margin-top: 10px; display: block; }
    .circuit-line { display: flex; align-items: center; gap: 4px; margin-top: 14px; }
    .circuit-line span { height: 1px; flex: 1; background: #1e3a5f; }
    .circuit-dot { width: 6px; height: 6px; border-radius: 50%; background: #2563eb; }
    .sidebar-footer { margin-top: auto; padding-top: 2rem; }
    .sidebar-footer p { font-size: 12px; color: #334155; line-height: 1.7; }
    .sidebar-tag {
      display: inline-flex; align-items: center; gap: 8px;
      background: #0f2040; border: 0.5px solid #1e3a5f;
      border-radius: 8px; padding: 7px 12px; margin-top: 14px;
    }
    .sidebar-tag span { font-size: 12px; color: #60a5fa; }
    .dot-pulse {
      width: 7px; height: 7px; border-radius: 50%;
      background: #22c55e; animation: pulse 2s infinite;
    }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.4} }
 
    /* ── Main ── */
    .main { flex: 1; display: flex; align-items: center; justify-content: center; padding: 2rem; }
 
    /* ── Card ── */
    .login-container {
      background: #ffffff; border-radius: 16px;
      border: 1px solid #e2e8f0; padding: 2.5rem 2.25rem;
      width: 100%; max-width: 420px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.06);
    }
    .card-header { margin-bottom: 2rem; }
    .card-header h1 { font-size: 22px; font-weight: 700; color: #0f172a; margin-bottom: 5px; }
    .card-header p  { font-size: 14px; color: #64748b; }
 
    /* ── Error ── */
    .error-msg {
      display: none; background: #fef2f2;
      border: 1px solid #fecaca; border-radius: 8px;
      padding: 10px 14px; font-size: 13px; color: #dc2626;
      margin-bottom: 1.25rem; align-items: center; gap: 8px;
    }
    .error-msg.show { display: flex; }
 
    /* ── Fields ── */
    .field { margin-bottom: 1.25rem; }
    .field label {
      display: block; font-size: 11px; font-weight: 600;
      color: #475569; margin-bottom: 7px;
      letter-spacing: 0.6px; text-transform: uppercase;
    }
    .input-wrap { position: relative; }
    .input-wrap .icon {
      position: absolute; left: 13px; top: 50%;
      transform: translateY(-50%); font-size: 17px;
      color: #94a3b8; pointer-events: none;
    }
    .input-wrap input {
      width: 100%; height: 46px; border: 1px solid #cbd5e1;
      border-radius: 9px; padding: 0 13px 0 40px;
      font-size: 14px; color: #0f172a; background: #f8fafc;
      outline: none; transition: border-color .15s, background .15s, box-shadow .15s;
    }
    .input-wrap input:focus {
      border-color: #2563eb; background: #ffffff;
      box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
    }
    .input-wrap input.error-field { border-color: #f87171; }
    .input-wrap input::placeholder { color: #cbd5e1; }
    .eye-btn {
      position: absolute; right: 13px; top: 50%;
      transform: translateY(-50%); background: none;
      border: none; color: #94a3b8; cursor: pointer;
      padding: 0; font-size: 17px; line-height: 1;
      display: flex; align-items: center; justify-content: center;
    }
    .eye-btn:hover { color: #475569; }
 
    /* ── Row ── */
    .row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; }
    .checkbox-label { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #64748b; cursor: pointer; user-select: none; }
    .checkbox-label input[type="checkbox"] { accent-color: #2563eb; width: 15px; height: 15px; cursor: pointer; }
    .forgot { font-size: 13px; color: #2563eb; text-decoration: none; }
    .forgot:hover { text-decoration: underline; }
 
    /* ── Button ── */
    .login-btn {
      width: 100%; height: 48px; background: #2563eb;
      color: #ffffff; border: none; border-radius: 9px;
      font-size: 15px; font-weight: 600; cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      gap: 8px; transition: background .15s, transform .1s; letter-spacing: 0.3px;
    }
    .login-btn:hover { background: #1d4ed8; }
    .login-btn:active { transform: scale(0.98); }
    .login-btn.loading { background: #93c5fd; cursor: not-allowed; pointer-events: none; }
 
    /* ── Divider ── */
    .divider { display: flex; align-items: center; gap: 12px; margin: 1.5rem 0; }
    .divider span { font-size: 12px; color: #94a3b8; }
    .divider-line { flex: 1; height: 1px; background: #e2e8f0; }
 
    /* ── Footer ── */
    .footer-text { text-align: center; font-size: 13px; color: #64748b; }
    .footer-text a { color: #2563eb; text-decoration: none; font-weight: 600; }
    .footer-text a:hover { text-decoration: underline; }
    .card-footer {
      margin-top: 2rem; padding-top: 1.25rem;
      border-top: 1px solid #f1f5f9;
      display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .card-footer .sep  { font-size: 12px; color: #cbd5e1; }
    .card-footer .copy { font-size: 12px; color: #94a3b8; }
    .secure-badge { display: flex; align-items: center; gap: 5px; }
    .secure-badge i    { font-size: 14px; color: #22c55e; }
    .secure-badge span { font-size: 12px; color: #22c55e; }
 
    /* ── Responsive ── */
    @media (max-width: 640px) {
      body { flex-direction: column; }
      .sidebar { width: 100%; min-height: unset; padding: 1.25rem 1.5rem; flex-direction: row; align-items: center; }
      .sidebar-footer { display: none; }
      .brand { margin-bottom: 0; }
      .main { padding: 1.5rem 1rem; align-items: flex-start; padding-top: 2rem; }
    }
  </style>
</head>
<body>
 
  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="brand">
      <span class="brand-name">PRABHAT</span>
      <span class="brand-sub">E L E C T R O N I C S</span>
      <span class="brand-tag">POWER · PRECISION · PERFORMANCE</span>
      <div class="circuit-line">
        <span></span><div class="circuit-dot"></div>
        <span></span><div class="circuit-dot"></div>
        <span></span><div class="circuit-dot"></div>
      </div>
    </div>
    <div class="sidebar-footer">
      <p>Secure enterprise portal for authorized personnel only.</p>
      <div class="sidebar-tag">
        <div class="dot-pulse"></div>
        <span>Systems operational</span>
      </div>
    </div>
  </aside>
 
  <!-- Main -->
  <main class="main">
    <div class="login-container">
 
      <!-- ✅ ONE single form — posts to /auth/authenticate -->
      <form method="POST" action="/auth/authenticate" id="loginForm">
 
        <div class="card-header">
          <h1>Login - Prabhat Electronics!</h1>
          <p>Sign in to your account to continue</p>
        </div>
 
        <!-- Error message — shown from PHP redirect or JS validation -->
        <div class="error-msg <?php echo $error ? 'show' : ''; ?>" id="errorMsg">
          <i class="ti ti-alert-circle"></i>
          <span id="errorText">
            <?php echo $error ? htmlspecialchars($error) : 'Please fill in all fields.'; ?>
          </span>
        </div>
 
        <!-- User ID -->
        <div class="field">
          <label for="user_id">User ID</label>
          <div class="input-wrap">
            <i class="ti ti-user icon"></i>
            <input
              type="text"
              name="user_id"
              id="user_id"
              placeholder="Enter your User ID"
              autocomplete="username"
              oninput="clearError()"
              value="<?php echo $error && isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : ''; ?>" />
          </div>
        </div>
 
        <!-- Password -->
        <div class="field">
          <label for="password">Password</label>
          <div class="input-wrap">
            <i class="ti ti-lock icon"></i>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Enter your password"
              autocomplete="current-password"
              oninput="clearError()"
              onkeydown="if(event.key==='Enter'){ submitForm(); }" />
            <button type="button" class="eye-btn" onclick="togglePassword()" aria-label="Toggle password">
              <i class="ti ti-eye" id="eyeIcon"></i>
            </button>
          </div>
        </div>
 
        <!-- Remember / Forgot -->
        <div class="row">
          <label class="checkbox-label">
            <input type="checkbox" name="remember" id="remember" /> Remember me
          </label>
          <a href="/auth/reset" class="forgot">Forgot password?</a>
        </div>
 
        <!-- Submit button — type="button" so JS validates first -->
        <button type="button" class="login-btn" id="loginBtn" onclick="submitForm()">
          <i class="ti ti-arrow-right"></i>
          Login
        </button>
 
        <!-- Divider -->
        <div class="divider">
          <div class="divider-line"></div>
          <span>or</span>
          <div class="divider-line"></div>
        </div>
 
        <!-- Forgot link -->
        <div class="footer-text">
          Forgot password? <a href="/auth/reset">Reset</a>
        </div>
 
        <!-- Card footer -->
        <div class="card-footer">
          <div class="secure-badge">
            <i class="ti ti-shield-check"></i>
            <span>SSL secured</span>
          </div>
          <span class="sep">·</span>
          <span class="copy">© 2026 Prabhat Electronics</span>
        </div>
 
      </form>
      <!-- ✅ Only ONE </form> closing tag -->
 
    </div>
  </main>
 
  <script>
    function togglePassword() {
      const input = document.getElementById('password');
      const icon  = document.getElementById('eyeIcon');
      if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'ti ti-eye-off';
      } else {
        input.type = 'password';
        icon.className = 'ti ti-eye';
      }
    }
 
    function showError(msg) {
      const box  = document.getElementById('errorMsg');
      const text = document.getElementById('errorText');
      text.textContent = msg;
      box.classList.add('show');
      if (!document.getElementById('user_id').value.trim())
        document.getElementById('user_id').classList.add('error-field');
      if (!document.getElementById('password').value)
        document.getElementById('password').classList.add('error-field');
    }
 
    function clearError() {
      document.getElementById('errorMsg').classList.remove('show');
      document.getElementById('user_id').classList.remove('error-field');
      document.getElementById('password').classList.remove('error-field');
    }
 
    function submitForm() {
      const userId   = document.getElementById('user_id').value.trim();
      const password = document.getElementById('password').value;
      const btn      = document.getElementById('loginBtn');
 
      if (!userId && !password) { showError('Please enter your User ID and Password.'); return; }
      if (!userId)               { showError('Please enter your User ID.');               return; }
      if (!password)             { showError('Please enter your Password.');               return; }
 
      btn.classList.add('loading');
      btn.innerHTML = '<i class="ti ti-loader"></i> Logging in…';
 
      // ✅ Submit the form — credentials go to /auth/authenticate via POST
      document.getElementById('loginForm').submit();
    }
 
    // ✅ Show PHP error on page load if redirected with ?error=
    window.addEventListener('DOMContentLoaded', function() {
      const urlError = new URLSearchParams(window.location.search).get('error');
      if (urlError) {
        showError(decodeURIComponent(urlError.replace(/\+/g, ' ')));
      }
    });
  </script>
 
</body>
</html>