<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Đăng Nhập / Đăng Ký – BẾP VIỆT';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= escapeHtml($pageTitle) ?></title>
  <meta name="description" content="Đăng nhập hoặc tạo tài khoản BẾP VIỆT để chia sẻ và lưu giữ công thức nấu ăn Việt Nam yêu thích." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    body { background: var(--mau-nen); }

    /* Layout chính */
    .tai-khoan-trang {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 1fr 1fr;
      margin-top: 0;
    }

    /* Cột trái – hình ảnh nền */
    .tai-khoan-hinh-anh {
      position: relative;
      overflow: hidden;
      min-height: 100vh;
    }

    .tai-khoan-hinh-anh-nen {
      position: absolute;
      inset: 0;
      background-image: url('images/hero-banner.png');
      background-size: cover;
      background-position: center;
    }

    .tai-khoan-hinh-lop-phu {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(192,57,43,0.90), rgba(26,15,8,0.80));
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 3rem;
      text-align: center;
    }

    .tai-khoan-hinh-logo {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 2.5rem;
      text-decoration: none;
    }

    .tai-khoan-hinh-logo .logo-bieu-tuong {
      width: 56px;
      height: 56px;
      font-size: 1.6rem;
    }

    .tai-khoan-hinh-logo .logo-ten-chinh {
      font-size: 1.8rem;
      font-weight: 800;
      color: white;
    }

    .tai-khoan-hinh-logo .logo-ten-phu {
      color: rgba(255,255,255,0.65);
    }

    .tai-khoan-quote {
      font-size: 1.4rem;
      font-weight: 700;
      color: white;
      line-height: 1.6;
      font-style: italic;
      margin-bottom: 2rem;
    }

    .tai-khoan-quote .chu-noi-bat {
      color: var(--mau-vang-cam);
    }

    .tai-khoan-dac-diem {
      display: flex;
      flex-direction: column;
      gap: 14px;
      text-align: left;
      width: 100%;
      max-width: 350px;
    }

    .tai-khoan-dac-diem-muc {
      display: flex;
      align-items: center;
      gap: 12px;
      color: rgba(255,255,255,0.88);
      font-size: 0.92rem;
    }

    .tai-khoan-dac-diem-muc .bieu-tuong {
      font-size: 1.3rem;
      flex-shrink: 0;
    }

    /* Cột phải – form */
    .tai-khoan-form-khu-vuc {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      min-height: 100vh;
      background: var(--mau-nen);
      overflow-y: auto;
    }

    .tai-khoan-form-noi-dung {
      width: 100%;
      max-width: 440px;
    }

    /* Tiêu đề form */
    .form-tieu-de {
      text-align: center;
      margin-bottom: 1.75rem;
    }

    .form-tieu-de h2 {
      font-size: 1.7rem;
      margin-bottom: 6px;
      color: var(--mau-chu-chinh);
    }

    .form-tieu-de p {
      font-size: 0.92rem;
      color: var(--mau-chu-phu);
    }

    /* Mật khẩu */
    .mat-khau-wrapper {
      position: relative;
    }

    .mat-khau-wrapper .form-o-nhap {
      padding-right: 46px;
    }

    .nut-hien-mat-khau {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1rem;
      color: var(--mau-chu-mo);
      padding: 0;
      line-height: 1;
      transition: color var(--toc-do-nhanh);
    }

    .nut-hien-mat-khau:hover {
      color: var(--mau-do-gach);
    }

    /* Ghi nhớ */
    .ghi-nho-nhom {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: var(--khoang-md);
    }

    .ghi-nho-label {
      display: flex;
      align-items: center;
      gap: 7px;
      font-size: 0.87rem;
      color: var(--mau-chu-phu);
      cursor: pointer;
      user-select: none;
    }

    .ghi-nho-label input[type="checkbox"] {
      accent-color: var(--mau-do-gach);
      width: 15px;
      height: 15px;
    }

    .quen-mat-khau {
      font-size: 0.87rem;
      color: var(--mau-do-gach);
      cursor: pointer;
      text-decoration: none;
      transition: opacity var(--toc-do-nhanh);
    }

    .quen-mat-khau:hover {
      opacity: 0.75;
    }

    /* Phân cách */
    .phan-cach-dang-nhap {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 1.5rem 0;
    }

    .phan-cach-dang-nhap::before,
    .phan-cach-dang-nhap::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--mau-vien);
    }

    .phan-cach-dang-nhap span {
      font-size: 0.82rem;
      color: var(--mau-chu-mo);
      white-space: nowrap;
    }

    /* Mạng xã hội */
    .dang-nhap-mang-xa-hoi {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-bottom: 1.5rem;
    }

    .nut-mxh {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 10px 14px;
      border: 1.5px solid var(--mau-vien);
      border-radius: var(--bo-vua);
      font-size: 0.88rem;
      font-weight: 600;
      cursor: pointer;
      background: white;
      transition: all var(--toc-do-nhanh);
      font-family: inherit;
      color: var(--mau-chu-chinh);
    }

    .nut-mxh:hover {
      border-color: var(--mau-do-gach);
      background: var(--mau-do-nhat);
      color: var(--mau-do-gach);
    }

    /* Chuyển tab */
    .chuyen-tab-link {
      text-align: center;
      font-size: 0.9rem;
      color: var(--mau-chu-phu);
      margin-top: 1.25rem;
    }

    .chuyen-tab-link a {
      color: var(--mau-do-gach);
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      transition: opacity var(--toc-do-nhanh);
    }

    .chuyen-tab-link a:hover {
      opacity: 0.75;
    }

    /* Độ mạnh mật khẩu */
    .do-manh-mat-khau {
      height: 4px;
      border-radius: 2px;
      background: var(--mau-vien);
      margin-top: 7px;
      overflow: hidden;
    }

    .do-manh-mat-khau-noi {
      height: 100%;
      border-radius: 2px;
      transition: width 0.35s ease, background 0.35s ease;
      width: 0%;
    }

    .do-manh-yeu   { background: var(--mau-do-gach); width: 33%; }
    .do-manh-trung { background: var(--mau-vang-cam); width: 66%; }
    .do-manh-manh  { background: var(--mau-xanh-la); width: 100%; }

    .do-manh-nhan-text {
      font-size: 0.75rem;
      margin-top: 4px;
      min-height: 18px;
    }

    /* Điều khoản */
    .dieu-khoan-nhom {
      display: flex;
      align-items: flex-start;
      gap: 9px;
      font-size: 0.87rem;
      color: var(--mau-chu-phu);
      cursor: pointer;
      line-height: 1.5;
    }

    .dieu-khoan-nhom input[type="checkbox"] {
      accent-color: var(--mau-do-gach);
      margin-top: 2px;
      flex-shrink: 0;
    }

    .dieu-khoan-nhom a {
      color: var(--mau-do-gach);
      text-decoration: none;
      font-weight: 600;
    }

    .dieu-khoan-nhom a:hover {
      text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .tai-khoan-trang { grid-template-columns: 1fr; }
      .tai-khoan-hinh-anh { display: none; }
      .tai-khoan-form-khu-vuc {
        min-height: 100vh;
        padding: 1.5rem;
        justify-content: flex-start;
        padding-top: 2.5rem;
      }
    }

    /* Navbar trang đăng nhập */
    .navbar-tai-khoan {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      background: rgba(253,246,236,0.98);
      border-bottom: 1px solid var(--mau-vien);
      backdrop-filter: blur(12px);
    }

    .navbar-tai-khoan .navbar-noi-dung {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 64px;
      padding: 0 var(--khoang-lg);
      max-width: var(--rong-max);
      margin: 0 auto;
    }

    .quay-lai-link {
      font-size: 0.88rem;
      color: var(--mau-chu-phu);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: color var(--toc-do-nhanh);
    }

    .quay-lai-link:hover {
      color: var(--mau-do-gach);
    }

    /* Điều chỉnh trang bù cho navbar */
    .tai-khoan-trang {
      padding-top: 64px;
    }

    .tai-khoan-hinh-anh {
      min-height: calc(100vh - 64px);
    }

    .tai-khoan-form-khu-vuc {
      min-height: calc(100vh - 64px);
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar-tai-khoan" id="navbar-tai-khoan">
  <div class="navbar-noi-dung">
    <a href="index.php" class="logo">
      <div class="logo-bieu-tuong">🍜</div>
      <div class="logo-ten">
        <span class="logo-ten-chinh">BẾP VIỆT</span>
        <span class="logo-ten-phu">Hương vị quê hương</span>
      </div>
    </a>
    <a href="index.php" class="quay-lai-link">
      ← Quay lại trang chủ
    </a>
  </div>
</nav>

<!-- NỘI DUNG CHÍNH -->
<div class="tai-khoan-trang">

  <!-- CỘT TRÁI: HÌNH ẢNH / THÔNG TIN -->
  <div class="tai-khoan-hinh-anh" aria-hidden="true">
    <div class="tai-khoan-hinh-anh-nen"></div>
    <div class="tai-khoan-hinh-lop-phu">
      <a href="index.php" class="tai-khoan-hinh-logo">
        <div class="logo-bieu-tuong" style="width:60px;height:60px;font-size:1.8rem;background:var(--mau-do-gach);border-radius:14px;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 20px rgba(0,0,0,0.3);">🍜</div>
        <div class="logo-ten">
          <span class="logo-ten-chinh">BẾP VIỆT</span>
          <span class="logo-ten-phu">Hương vị quê hương</span>
        </div>
      </a>

      <div class="tai-khoan-quote">
        "Giữ hồn ẩm thực Việt –<br/>
        <span class="chu-noi-bat">Lan tỏa vị ngon quê nhà</span>"
      </div>

      <div class="tai-khoan-dac-diem">
        <div class="tai-khoan-dac-diem-muc">
          <span class="bieu-tuong">🍜</span>
          <span>Khám phá 500+ công thức nấu ăn Việt Nam</span>
        </div>
        <div class="tai-khoan-dac-diem-muc">
          <span class="bieu-tuong">❤️</span>
          <span>Lưu món ăn yêu thích vào bộ sưu tập cá nhân</span>
        </div>
        <div class="tai-khoan-dac-diem-muc">
          <span class="bieu-tuong">✍️</span>
          <span>Chia sẻ công thức của bạn với cộng đồng</span>
        </div>
        <div class="tai-khoan-dac-diem-muc">
          <span class="bieu-tuong">👨‍👩‍👧‍👦</span>
          <span>Kết nối với 50.000+ người yêu ẩm thực Việt</span>
        </div>
      </div>
    </div>
  </div>

  <!-- CỘT PHẢI: FORM -->
  <div class="tai-khoan-form-khu-vuc">
    <div class="tai-khoan-form-noi-dung">

      <!-- TAB CHỌN -->
      <div class="tab-chon" role="tablist" aria-label="Chọn hành động">
        <button class="tab-nut hoat-dong" id="tab-dang-nhap" role="tab" aria-selected="true" aria-controls="form-dang-nhap">
          Đăng nhập
        </button>
        <button class="tab-nut" id="tab-dang-ky" role="tab" aria-selected="false" aria-controls="form-dang-ky">
          Đăng ký
        </button>
      </div>

      <!-- ===================== FORM ĐĂNG NHẬP ===================== -->
      <div id="form-dang-nhap" role="tabpanel">
        <div class="form-tieu-de">
          <h2>Chào mừng trở lại! 👋</h2>
          <p>Đăng nhập để tiếp tục khám phá ẩm thực Việt Nam</p>
        </div>

        <!-- Đăng nhập mạng xã hội -->
        <div class="dang-nhap-mang-xa-hoi">
          <button class="nut-mxh" id="nut-google-dn" type="button">
            <span>🔵</span> Google
          </button>
          <button class="nut-mxh" id="nut-facebook-dn" type="button">
            <span>📘</span> Facebook
          </button>
        </div>

        <div class="phan-cach-dang-nhap">
          <span>hoặc đăng nhập bằng email</span>
        </div>

        <form id="form-dang-nhap-email" novalidate>
          <div class="form-nhom">
            <label class="form-nhan" for="email-dn">Địa chỉ email</label>
            <input type="email" id="email-dn" class="form-o-nhap" placeholder="nguyen@example.com" required autocomplete="email" />
            <span class="form-thong-bao-loi" id="loi-email-dn">Vui lòng nhập địa chỉ email hợp lệ</span>
          </div>

          <div class="form-nhom">
            <label class="form-nhan" for="mat-khau-dn">Mật khẩu</label>
            <div class="mat-khau-wrapper">
              <input type="password" id="mat-khau-dn" class="form-o-nhap" placeholder="Nhập mật khẩu của bạn" required autocomplete="current-password" />
              <button type="button" class="nut-hien-mat-khau" id="hien-dn" aria-label="Hiện/ẩn mật khẩu">👁️</button>
            </div>
            <span class="form-thong-bao-loi" id="loi-matkhau-dn">Vui lòng nhập mật khẩu</span>
          </div>

          <div class="ghi-nho-nhom">
            <label class="ghi-nho-label">
              <input type="checkbox" id="ghi-nho" />
              Ghi nhớ đăng nhập
            </label>
            <a href="#" class="quen-mat-khau" id="lien-ket-quen-mk">Quên mật khẩu?</a>
          </div>

          <button type="submit" class="nut nut-chinh nut-block nut-lon" id="nut-dang-nhap">
            🔑 Đăng nhập
          </button>
        </form>

        <div class="chuyen-tab-link">
          Chưa có tài khoản? <a href="#" id="lien-ket-den-dangky">Đăng ký ngay</a>
        </div>
      </div>

      <!-- ===================== FORM ĐĂNG KÝ ===================== -->
      <div id="form-dang-ky" role="tabpanel" style="display:none;">
        <div class="form-tieu-de">
          <h2>Tạo tài khoản mới 🎉</h2>
          <p>Tham gia cộng đồng ẩm thực Việt Nam cùng BẾP VIỆT</p>
        </div>

        <!-- Đăng ký mạng xã hội -->
        <div class="dang-nhap-mang-xa-hoi">
          <button class="nut-mxh" id="nut-google-dk" type="button">
            <span>🔵</span> Google
          </button>
          <button class="nut-mxh" id="nut-facebook-dk" type="button">
            <span>📘</span> Facebook
          </button>
        </div>

        <div class="phan-cach-dang-nhap">
          <span>hoặc đăng ký bằng email</span>
        </div>

        <form id="form-dang-ky-email" novalidate>
          <div class="form-luoi">
            <div class="form-nhom">
              <label class="form-nhan" for="ho-ten">Họ và tên <span class="bat-buoc">*</span></label>
              <input type="text" id="ho-ten" class="form-o-nhap" placeholder="Nguyễn Thị Hoa" required autocomplete="name" />
              <span class="form-thong-bao-loi" id="loi-ho-ten">Vui lòng nhập họ và tên</span>
            </div>
            <div class="form-nhom">
              <label class="form-nhan" for="ten-hien-thi">Tên hiển thị <span class="bat-buoc">*</span></label>
              <input type="text" id="ten-hien-thi" class="form-o-nhap" placeholder="MẹHoa_BếpViệt" required />
              <span class="form-thong-bao-loi" id="loi-ten-hd">Vui lòng nhập tên hiển thị</span>
            </div>
          </div>

          <div class="form-nhom">
            <label class="form-nhan" for="email-dk">Địa chỉ email <span class="bat-buoc">*</span></label>
            <input type="email" id="email-dk" class="form-o-nhap" placeholder="nguyen@example.com" required autocomplete="email" />
            <span class="form-thong-bao-loi" id="loi-email-dk">Vui lòng nhập địa chỉ email hợp lệ</span>
          </div>

          <div class="form-nhom">
            <label class="form-nhan" for="mat-khau-dk">Mật khẩu <span class="bat-buoc">*</span></label>
            <div class="mat-khau-wrapper">
              <input type="password" id="mat-khau-dk" class="form-o-nhap" placeholder="Tối thiểu 8 ký tự" required minlength="8" autocomplete="new-password" />
              <button type="button" class="nut-hien-mat-khau" id="hien-dk" aria-label="Hiện/ẩn mật khẩu">👁️</button>
            </div>
            <div class="do-manh-mat-khau">
              <div class="do-manh-mat-khau-noi" id="do-manh-noi"></div>
            </div>
            <div class="do-manh-nhan-text" id="do-manh-nhan"></div>
          </div>

          <div class="form-nhom">
            <label class="form-nhan" for="nhap-lai-mat-khau">Nhập lại mật khẩu <span class="bat-buoc">*</span></label>
            <div class="mat-khau-wrapper">
              <input type="password" id="nhap-lai-mat-khau" class="form-o-nhap" placeholder="Nhập lại mật khẩu" required autocomplete="new-password" />
              <button type="button" class="nut-hien-mat-khau" id="hien-nlmk" aria-label="Hiện/ẩn mật khẩu">👁️</button>
            </div>
            <span class="form-thong-bao-loi" id="loi-mat-khau">Mật khẩu không khớp</span>
          </div>

          <div class="form-nhom" style="margin-bottom:var(--khoang-md);">
            <label class="dieu-khoan-nhom">
              <input type="checkbox" id="dong-y-dieu-khoan" required />
              <span>Tôi đồng ý với <a href="#">Điều khoản dịch vụ</a> và <a href="#">Chính sách bảo mật</a> của BẾP VIỆT</span>
            </label>
            <span class="form-thong-bao-loi" id="loi-dieu-khoan">Vui lòng đồng ý với điều khoản dịch vụ</span>
          </div>

          <button type="submit" class="nut nut-chinh nut-block nut-lon" id="nut-tao-tai-khoan">
            🎉 Tạo tài khoản ngay
          </button>
        </form>

        <div class="chuyen-tab-link">
          Đã có tài khoản? <a href="#" id="lien-ket-den-dangnhap">Đăng nhập</a>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Container thông báo toast -->
<div class="thong-bao-container" id="thong-bao-container"></div>

<script src="js/main.js"></script>
<script>
/* ============================================================
   TRANG ĐĂNG NHẬP / ĐĂNG KÝ – Script riêng
   Không phụ thuộc vào khoiTaoFormTaiKhoan() trong main.js
   ============================================================ */
(function () {
  'use strict';

  // ── Helper: Hiển thị thông báo toast ──────────────────────
  function toast(nd, loai) {
    // Dùng BepViet nếu đã load, không thì tự tạo
    if (window.BepViet && window.BepViet.hienThongBao) {
      window.BepViet.hienThongBao(nd, loai || 'thanh-cong');
    } else {
      var c = document.getElementById('thong-bao-container');
      if (!c) return;
      var el = document.createElement('div');
      el.className = 'thong-bao thong-bao-' + (loai || 'thanh-cong');
      el.innerHTML = '<span style="flex:1;font-size:.9rem">' + nd + '</span>' +
        '<button onclick="this.parentNode.remove()" style="background:none;border:none;cursor:pointer;font-size:1rem;color:#999;padding:0 4px">✕</button>';
      c.appendChild(el);
      setTimeout(function () {
        el.classList.add('bien-mat');
        setTimeout(function () { el.remove(); }, 300);
      }, 4000);
    }
  }

  // ── Chuyển đổi tab ────────────────────────────────────────
  var tabDN     = document.getElementById('tab-dang-nhap');
  var tabDK     = document.getElementById('tab-dang-ky');
  var panelDN   = document.getElementById('form-dang-nhap');
  var panelDK   = document.getElementById('form-dang-ky');

  function chuyenTab(tab) {
    if (tab === 'dang-nhap') {
      tabDN.classList.add('hoat-dong');
      tabDN.setAttribute('aria-selected', 'true');
      tabDK.classList.remove('hoat-dong');
      tabDK.setAttribute('aria-selected', 'false');
      panelDN.style.display = 'block';
      panelDK.style.display = 'none';
    } else {
      tabDK.classList.add('hoat-dong');
      tabDK.setAttribute('aria-selected', 'true');
      tabDN.classList.remove('hoat-dong');
      tabDN.setAttribute('aria-selected', 'false');
      panelDN.style.display = 'none';
      panelDK.style.display = 'block';
    }
    // Cuộn lên đầu form
    document.querySelector('.tai-khoan-form-khu-vuc').scrollTop = 0;
  }

  tabDN.addEventListener('click', function () { chuyenTab('dang-nhap'); });
  tabDK.addEventListener('click', function () { chuyenTab('dang-ky'); });

  // Liên kết chuyển tab bên dưới form
  document.getElementById('lien-ket-den-dangky').addEventListener('click', function (e) {
    e.preventDefault();
    chuyenTab('dang-ky');
  });
  document.getElementById('lien-ket-den-dangnhap').addEventListener('click', function (e) {
    e.preventDefault();
    chuyenTab('dang-nhap');
  });

  // Đọc tham số URL để mở đúng tab
  var params = new URLSearchParams(window.location.search);
  if (params.get('tab') === 'dang-ky') {
    chuyenTab('dang-ky');
  }

  // ── Hiện/ẩn mật khẩu ─────────────────────────────────────
  function ganNutHienMatKhau(nutId, inputId) {
    var nut = document.getElementById(nutId);
    var inp = document.getElementById(inputId);
    if (!nut || !inp) return;
    nut.addEventListener('click', function () {
      var danHien = inp.type === 'text';
      inp.type = danHien ? 'password' : 'text';
      nut.textContent = danHien ? '👁️' : '🙈';
    });
  }

  ganNutHienMatKhau('hien-dn',   'mat-khau-dn');
  ganNutHienMatKhau('hien-dk',   'mat-khau-dk');
  ganNutHienMatKhau('hien-nlmk', 'nhap-lai-mat-khau');

  // ── Độ mạnh mật khẩu ─────────────────────────────────────
  var inputMK = document.getElementById('mat-khau-dk');
  if (inputMK) {
    inputMK.addEventListener('input', function () {
      kiemTraDoManh(this.value);
    });
  }

  function kiemTraDoManh(val) {
    var noi  = document.getElementById('do-manh-noi');
    var nhan = document.getElementById('do-manh-nhan');
    if (!noi) return;

    noi.className = 'do-manh-mat-khau-noi';
    nhan.textContent = '';
    nhan.style.color = '';

    if (!val) return;

    var dm = 0;
    if (val.length >= 8)              dm++;
    if (/[A-Z]/.test(val))           dm++;
    if (/[0-9]/.test(val))           dm++;
    if (/[^A-Za-z0-9]/.test(val))    dm++;

    if (dm <= 1) {
      noi.classList.add('do-manh-yeu');
      nhan.textContent = '⚠️ Mật khẩu yếu – thêm chữ hoa, số hoặc ký tự đặc biệt';
      nhan.style.color = 'var(--mau-do-gach)';
    } else if (dm <= 2) {
      noi.classList.add('do-manh-trung');
      nhan.textContent = '📊 Mật khẩu trung bình';
      nhan.style.color = 'var(--mau-vang-cam)';
    } else {
      noi.classList.add('do-manh-manh');
      nhan.textContent = '✅ Mật khẩu mạnh';
      nhan.style.color = 'var(--mau-xanh-la)';
    }
  }

  // ── Hiển thị/ẩn lỗi ──────────────────────────────────────
  function hienLoi(id, hien) {
    var el = document.getElementById(id);
    if (el) el.classList.toggle('hien', hien);
  }

  function datLoiInput(inputEl, coLoi) {
    if (coLoi) {
      inputEl.classList.add('loi');
    } else {
      inputEl.classList.remove('loi');
    }
  }

  // ── XỬ LÝ FORM ĐĂNG NHẬP ─────────────────────────────────
  var formDN = document.getElementById('form-dang-nhap-email');
  if (formDN) {
    formDN.addEventListener('submit', function (e) {
      e.preventDefault();

      var emailEl = document.getElementById('email-dn');
      var mkEl    = document.getElementById('mat-khau-dn');
      var email   = emailEl.value.trim();
      var mk      = mkEl.value;
      var hopLe   = true;

      // Kiểm tra email
      var emailHopLe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
      datLoiInput(emailEl, !emailHopLe);
      hienLoi('loi-email-dn', !emailHopLe);
      if (!emailHopLe) hopLe = false;

      // Kiểm tra mật khẩu
      datLoiInput(mkEl, !mk);
      hienLoi('loi-matkhau-dn', !mk);
      if (!mk) hopLe = false;

      if (!hopLe) {
        toast('⚠️ Vui lòng kiểm tra lại thông tin đã nhập!', 'loi');
        return;
      }

      // Giả lập đăng nhập
      var nut = document.getElementById('nut-dang-nhap');
      nut.disabled = true;
      nut.textContent = 'Đang đăng nhập...';

      setTimeout(function () {
        toast('✅ Đăng nhập thành công! Chào mừng bạn trở lại BẾP VIỆT!', 'thanh-cong');
        setTimeout(function () {
          window.location.href = 'ca-nhan.php';
        }, 1200);
      }, 1000);
    });

    // Xóa lỗi khi người dùng nhập lại
    document.getElementById('email-dn').addEventListener('input', function () {
      hienLoi('loi-email-dn', false);
      datLoiInput(this, false);
    });
    document.getElementById('mat-khau-dn').addEventListener('input', function () {
      hienLoi('loi-matkhau-dn', false);
      datLoiInput(this, false);
    });
  }

  // ── XỬ LÝ FORM ĐĂNG KÝ ───────────────────────────────────
  var formDK = document.getElementById('form-dang-ky-email');
  if (formDK) {
    formDK.addEventListener('submit', function (e) {
      e.preventDefault();

      var hoTenEl    = document.getElementById('ho-ten');
      var tenHDEl    = document.getElementById('ten-hien-thi');
      var emailDKEl  = document.getElementById('email-dk');
      var mkDKEl     = document.getElementById('mat-khau-dk');
      var nlMKEl     = document.getElementById('nhap-lai-mat-khau');
      var dkEl       = document.getElementById('dong-y-dieu-khoan');

      var hopLe = true;

      // Họ và tên
      var hoTenHopLe = hoTenEl.value.trim().length >= 2;
      datLoiInput(hoTenEl, !hoTenHopLe);
      hienLoi('loi-ho-ten', !hoTenHopLe);
      if (!hoTenHopLe) hopLe = false;

      // Tên hiển thị
      var tenHDHopLe = tenHDEl.value.trim().length >= 2;
      datLoiInput(tenHDEl, !tenHDHopLe);
      hienLoi('loi-ten-hd', !tenHDHopLe);
      if (!tenHDHopLe) hopLe = false;

      // Email
      var emailHopLe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailDKEl.value.trim());
      datLoiInput(emailDKEl, !emailHopLe);
      hienLoi('loi-email-dk', !emailHopLe);
      if (!emailHopLe) hopLe = false;

      // Mật khẩu tối thiểu 8 ký tự
      var mkHopLe = mkDKEl.value.length >= 8;
      datLoiInput(mkDKEl, !mkHopLe);
      if (!mkHopLe) hopLe = false;

      // Nhập lại mật khẩu
      var khopMK = mkDKEl.value === nlMKEl.value && nlMKEl.value.length > 0;
      datLoiInput(nlMKEl, !khopMK);
      hienLoi('loi-mat-khau', !khopMK);
      if (!khopMK) hopLe = false;

      // Điều khoản
      if (!dkEl.checked) {
        hienLoi('loi-dieu-khoan', true);
        hopLe = false;
      } else {
        hienLoi('loi-dieu-khoan', false);
      }

      if (!hopLe) {
        toast('⚠️ Vui lòng điền đầy đủ và chính xác các thông tin bắt buộc!', 'loi');
        // Cuộn tới trường lỗi đầu tiên
        var truongLoi = formDK.querySelector('.form-o-nhap.loi');
        if (truongLoi) {
          truongLoi.scrollIntoView({ behavior: 'smooth', block: 'center' });
          truongLoi.focus();
        }
        return;
      }

      // Giả lập tạo tài khoản
      var nut = document.getElementById('nut-tao-tai-khoan');
      nut.disabled = true;
      nut.textContent = 'Đang tạo tài khoản...';

      setTimeout(function () {
        toast('🎉 Tạo tài khoản thành công! Chào mừng bạn đến với BẾP VIỆT!', 'thanh-cong');
        setTimeout(function () {
          window.location.href = 'ca-nhan.php';
        }, 1300);
      }, 1200);
    });

    // Xóa lỗi khi người dùng nhập lại
    var clearFields = ['ho-ten', 'ten-hien-thi', 'email-dk', 'mat-khau-dk', 'nhap-lai-mat-khau'];
    var clearLois   = ['loi-ho-ten', 'loi-ten-hd', 'loi-email-dk', null, 'loi-mat-khau'];
    clearFields.forEach(function (id, i) {
      var el = document.getElementById(id);
      if (!el) return;
      el.addEventListener('input', function () {
        datLoiInput(el, false);
        if (clearLois[i]) hienLoi(clearLois[i], false);
      });
    });

    document.getElementById('dong-y-dieu-khoan').addEventListener('change', function () {
      hienLoi('loi-dieu-khoan', false);
    });
  }

  // ── Đăng nhập mạng xã hội ────────────────────────────────
  function xuLyDangNhapMXH(ten) {
    toast('🔄 Đang chuyển đến ' + ten + '...', 'canh-bao');
    setTimeout(function () {
      toast('✅ Đăng nhập với ' + ten + ' thành công!', 'thanh-cong');
      setTimeout(function () {
        window.location.href = 'ca-nhan.php';
      }, 1000);
    }, 1500);
  }

  ['nut-google-dn', 'nut-google-dk'].forEach(function (id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function () { xuLyDangNhapMXH('Google'); });
  });
  ['nut-facebook-dn', 'nut-facebook-dk'].forEach(function (id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function () { xuLyDangNhapMXH('Facebook'); });
  });

  // ── Quên mật khẩu ────────────────────────────────────────
  var lienKetQuenMK = document.getElementById('lien-ket-quen-mk');
  if (lienKetQuenMK) {
    lienKetQuenMK.addEventListener('click', function (e) {
      e.preventDefault();
      var email = document.getElementById('email-dn').value.trim();
      if (email && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        toast('📧 Đã gửi email đặt lại mật khẩu đến ' + email, 'thanh-cong');
      } else {
        toast('⚠️ Vui lòng nhập địa chỉ email trước khi đặt lại mật khẩu!', 'canh-bao');
        document.getElementById('email-dn').focus();
      }
    });
  }

})();
</script>
</body>
</html>
