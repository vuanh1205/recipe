<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Chia Sẻ Công Thức Nấu Ăn – BẾP VIỆT';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= escapeHtml($pageTitle) ?></title>
  <meta name="description" content="Chia sẻ công thức nấu ăn của bạn với cộng đồng BẾP VIỆT. Lưu giữ và lan tỏa hương vị Việt Nam." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    .chia-se-trang { padding-top: 70px; }

    .chia-se-layout {
      display: grid;
      grid-template-columns: 1fr 320px;
      gap: var(--khoang-xl);
      align-items: start;
      padding: 2.5rem 0 4rem;
    }

    .huong-dan-the {
      background: white;
      border-radius: var(--bo-lon);
      padding: var(--khoang-lg);
      box-shadow: var(--bong-nhe);
      border: 1px solid var(--mau-vien-nhat);
      position: sticky;
      top: 90px;
    }

    .huong-dan-tieu-de {
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: var(--khoang-md);
      color: var(--mau-do-gach);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .huong-dan-buoc {
      display: flex;
      gap: 10px;
      margin-bottom: 10px;
      font-size: 0.85rem;
      color: var(--mau-chu-phu);
    }

    .huong-dan-so {
      width: 22px;
      height: 22px;
      min-width: 22px;
      border-radius: 50%;
      background: var(--mau-do-gach);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.72rem;
      font-weight: 700;
      margin-top: 1px;
    }

    .anh-preview-container {
      position: relative;
      display: none;
    }

    .anh-preview-container.hien {
      display: block;
      margin-top: 12px;
    }

    #anh-preview {
      width: 100%;
      aspect-ratio: 16/9;
      object-fit: cover;
      border-radius: var(--bo-vua);
      display: none;
    }

    .nut-hanh-dong {
      display: flex;
      gap: var(--khoang-sm);
      justify-content: flex-end;
      flex-wrap: wrap;
      margin-top: var(--khoang-xl);
    }

    .buong-nguyen-lieu-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: var(--khoang-sm);
    }

    @media (max-width: 1024px) {
      .chia-se-layout { grid-template-columns: 1fr; }
      .huong-dan-the { position: static; order: -1; }
    }

    .dieu-khoan-nhan {
      display: flex;
      align-items: flex-start;
      gap: 8px;
      font-size: 0.85rem;
      color: var(--mau-chu-phu);
    }

    .dieu-khoan-nhan input[type="checkbox"] {
      margin-top: 2px;
      accent-color: var(--mau-do-gach);
    }
  </style>
</head>
<body class="chia-se-trang">

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <div class="navbar-noi-dung">
    <a href="index.php" class="logo">
      <div class="logo-bieu-tuong">🍜</div>
      <div class="logo-ten">
        <span class="logo-ten-chinh">BẾP VIỆT</span>
        <span class="logo-ten-phu">Hương vị quê hương</span>
      </div>
    </a>
    <ul class="nav-menu">
      <li><a href="index.php" class="nav-lien-ket">Trang chủ</a></li>
      <li><a href="kham-pha.php" class="nav-lien-ket">Khám phá món ngon</a></li>
      <li><a href="kham-pha.php?mien=ba-mien" class="nav-lien-ket">Ẩm thực ba miền</a></li>
      <li><a href="chia-se.php" class="nav-lien-ket hoat-dong">Chia sẻ công thức</a></li>
      <li><a href="index.php#gioi-thieu" class="nav-lien-ket">Giới thiệu</a></li>
    </ul>
    <div class="nav-nut-nhom">
      <a href="tai-khoan.php" class="nut-dang-nhap">Đăng nhập</a>
      <a href="tai-khoan.php?tab=dang-ky" class="nut-dang-ky">Đăng ký</a>
    </div>
    <button class="nut-menu-mobile" id="nut-menu-mobile" aria-label="Mở menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- TIÊU ĐỀ TRANG -->
<div class="trang-tieu-de">
  <div class="trang-tieu-de-noi-dung container-sm">
    <h1>✍️ Chia Sẻ Công Thức Nấu Ăn</h1>
    <p>Chia sẻ bí quyết nấu ăn của bạn với hàng nghìn người yêu ẩm thực Việt Nam</p>
  </div>
</div>

<!-- NỘI DUNG CHÍNH -->
<main>
  <div class="container-sm">
    <div class="chia-se-layout">

      <!-- CỘT TRÁI: FORM -->
      <div>
        <form id="form-chia-se">

          <!-- THÔNG TIN CƠ BẢN -->
          <div class="form-the hieu-ung-tai">
            <div class="form-tieu-de-the">
              📝 Thông tin cơ bản
            </div>

            <div class="form-nhom">
              <label class="form-nhan" for="ten-mon-an">Tên món ăn <span class="bat-buoc">*</span></label>
              <input type="text" id="ten-mon-an" class="form-o-nhap" placeholder="Ví dụ: Phở Bò Hà Nội đúng chuẩn" required />
              <span class="form-thong-bao-loi">Vui lòng nhập tên món ăn</span>
            </div>

            <div class="form-nhom">
              <label class="form-nhan" for="gioi-thieu-mon">Giới thiệu món ăn <span class="bat-buoc">*</span></label>
              <textarea id="gioi-thieu-mon" class="form-vung-nhap" rows="4"
                placeholder="Mô tả ngắn về món ăn, nguồn gốc và điều đặc biệt của món ăn này..." required></textarea>
              <span class="form-thong-bao-loi">Vui lòng giới thiệu về món ăn</span>
            </div>

            <div class="form-luoi">
              <div class="form-nhom">
                <label class="form-nhan" for="vung-mien">Vùng miền <span class="bat-buoc">*</span></label>
                <select id="vung-mien" class="form-chon" required>
                  <option value="">-- Chọn vùng miền --</option>
                  <option value="mien-bac">🏔️ Miền Bắc</option>
                  <option value="mien-trung">🌊 Miền Trung</option>
                  <option value="mien-nam">🌴 Miền Nam</option>
                  <option value="ca-nuoc">🗺️ Toàn quốc</option>
                </select>
                <span class="form-thong-bao-loi">Vui lòng chọn vùng miền</span>
              </div>

              <div class="form-nhom">
                <label class="form-nhan" for="danh-muc">Danh mục <span class="bat-buoc">*</span></label>
                <select id="danh-muc" class="form-chon" required>
                  <option value="">-- Chọn danh mục --</option>
                  <option value="gia-dinh">🍚 Món ăn gia đình</option>
                  <option value="khai-vi">🥗 Khai vị</option>
                  <option value="mon-chinh">🍖 Món chính</option>
                  <option value="canh">🥣 Canh & Súp</option>
                  <option value="chay">🥬 Món chay</option>
                  <option value="trang-miem">🍮 Tráng miệng</option>
                  <option value="do-uong">🍹 Đồ uống</option>
                </select>
              </div>
            </div>
          </div>

          <!-- HÌNH ẢNH -->
          <div class="form-the hieu-ung-tai">
            <div class="form-tieu-de-the">🖼️ Hình ảnh món ăn</div>

            <div class="upload-anh" id="upload-khu-vuc">
              <input type="file" id="upload-anh" accept="image/*" aria-label="Tải lên hình ảnh món ăn" />
              <div class="upload-bieu-tuong">📷</div>
              <div class="upload-noi-dung">
                <strong>Nhấn để chọn ảnh</strong> hoặc kéo thả ảnh vào đây<br />
                <span style="font-size:0.8rem;color:var(--mau-chu-mo);">Hỗ trợ JPG, PNG, WEBP – Tối đa 5MB</span>
              </div>
              <img id="anh-preview" alt="Xem trước ảnh" />
            </div>

            <p style="font-size:0.82rem;color:var(--mau-chu-mo);margin-top:8px;">
              💡 Chụp ảnh món ăn từ góc trên xuống hoặc 45° để hình ảnh đẹp nhất
            </p>
          </div>

          <!-- THỜI GIAN & KHẨu PHẦN -->
          <div class="form-the hieu-ung-tai">
            <div class="form-tieu-de-the">⏱️ Thời gian & Khẩu phần</div>

            <div class="form-luoi form-luoi-3">
              <div class="form-nhom">
                <label class="form-nhan" for="thoi-gian-chuan-bi">Thời gian chuẩn bị <span class="bat-buoc">*</span></label>
                <input type="text" id="thoi-gian-chuan-bi" class="form-o-nhap" placeholder="Ví dụ: 30 phút" required />
                <span class="form-thong-bao-loi">Vui lòng nhập thời gian</span>
              </div>

              <div class="form-nhom">
                <label class="form-nhan" for="thoi-gian-nau">Thời gian chế biến <span class="bat-buoc">*</span></label>
                <input type="text" id="thoi-gian-nau" class="form-o-nhap" placeholder="Ví dụ: 2 tiếng" required />
                <span class="form-thong-bao-loi">Vui lòng nhập thời gian</span>
              </div>

              <div class="form-nhom">
                <label class="form-nhan" for="khau-phan">Số khẩu phần <span class="bat-buoc">*</span></label>
                <input type="number" id="khau-phan" class="form-o-nhap" placeholder="Ví dụ: 4" min="1" required />
                <span class="form-thong-bao-loi">Vui lòng nhập số người</span>
              </div>
            </div>

            <div class="form-nhom">
              <label class="form-nhan">Độ khó</label>
              <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;padding:8px 16px;border:1.5px solid var(--mau-vien);border-radius:var(--bo-tron);font-size:0.9rem;transition:all 0.15s;">
                  <input type="radio" name="do-kho" value="de" style="accent-color:var(--mau-do-gach);" /> ⚡ Dễ
                </label>
                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;padding:8px 16px;border:1.5px solid var(--mau-vien);border-radius:var(--bo-tron);font-size:0.9rem;transition:all 0.15s;">
                  <input type="radio" name="do-kho" value="trung-binh" style="accent-color:var(--mau-do-gach);" /> 🔥 Trung bình
                </label>
                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;padding:8px 16px;border:1.5px solid var(--mau-vien);border-radius:var(--bo-tron);font-size:0.9rem;transition:all 0.15s;">
                  <input type="radio" name="do-kho" value="kho" style="accent-color:var(--mau-do-gach);" /> 🏆 Khó
                </label>
              </div>
            </div>
          </div>

          <!-- NGUYÊN LIỆU -->
          <div class="form-the hieu-ung-tai">
            <div class="form-tieu-de-the">🥬 Nguyên liệu cần chuẩn bị</div>

            <div class="buong-nguyen-lieu-header">
              <p style="font-size:0.85rem;color:var(--mau-chu-phu);">Nhập từng nguyên liệu và số lượng tương ứng</p>
            </div>

            <div id="nguyen-lieu-container">
              <div class="nguyen-lieu-muc">
                <input type="text" class="form-o-nhap" placeholder="Tên nguyên liệu (vd: Thịt bò)" />
                <input type="text" class="form-o-nhap so-luong" placeholder="Số lượng (vd: 500g)" />
                <button type="button" class="nut-xoa-muc" title="Xóa">✕</button>
              </div>
              <div class="nguyen-lieu-muc">
                <input type="text" class="form-o-nhap" placeholder="Tên nguyên liệu (vd: Xương bò)" />
                <input type="text" class="form-o-nhap so-luong" placeholder="Số lượng (vd: 1kg)" />
                <button type="button" class="nut-xoa-muc" title="Xóa">✕</button>
              </div>
              <div class="nguyen-lieu-muc">
                <input type="text" class="form-o-nhap" placeholder="Tên nguyên liệu (vd: Bánh phở)" />
                <input type="text" class="form-o-nhap so-luong" placeholder="Số lượng (vd: 500g)" />
                <button type="button" class="nut-xoa-muc" title="Xóa">✕</button>
              </div>
            </div>

            <button type="button" id="nut-them-nguyen-lieu" class="nut nut-xanh nut-nho" style="margin-top:var(--khoang-sm);">
              + Thêm nguyên liệu
            </button>
          </div>

          <!-- CÁC BƯỚC CHẾ BIẾN -->
          <div class="form-the hieu-ung-tai">
            <div class="form-tieu-de-the">👨‍🍳 Hướng dẫn chế biến từng bước</div>

            <div class="buong-nguyen-lieu-header">
              <p style="font-size:0.85rem;color:var(--mau-chu-phu);">Mô tả chi tiết từng bước thực hiện</p>
            </div>

            <div id="buoc-container">
              <div class="buoc-che-bien-muc">
                <div class="buoc-so-nhan">1</div>
                <textarea class="form-vung-nhap" placeholder="Mô tả bước 1: Sơ chế nguyên liệu..." rows="3"></textarea>
                <button type="button" class="nut-xoa-muc" title="Xóa bước">✕</button>
              </div>
              <div class="buoc-che-bien-muc">
                <div class="buoc-so-nhan">2</div>
                <textarea class="form-vung-nhap" placeholder="Mô tả bước 2: Chế biến nguyên liệu..." rows="3"></textarea>
                <button type="button" class="nut-xoa-muc" title="Xóa bước">✕</button>
              </div>
              <div class="buoc-che-bien-muc">
                <div class="buoc-so-nhan">3</div>
                <textarea class="form-vung-nhap" placeholder="Mô tả bước 3: Hoàn thiện và trình bày..." rows="3"></textarea>
                <button type="button" class="nut-xoa-muc" title="Xóa bước">✕</button>
              </div>
            </div>

            <button type="button" id="nut-them-buoc" class="nut nut-xanh nut-nho" style="margin-top:var(--khoang-sm);">
              + Thêm bước chế biến
            </button>
          </div>

          <!-- MẸO NẤU ĂN -->
          <div class="form-the hieu-ung-tai">
            <div class="form-tieu-de-the">💡 Mẹo nấu ăn (tùy chọn)</div>

            <div class="form-nhom">
              <label class="form-nhan" for="meo-nau">Chia sẻ bí quyết và mẹo nấu ăn của bạn</label>
              <textarea id="meo-nau" class="form-vung-nhap" rows="4"
                placeholder="Ví dụ: Bí quyết để nước dùng trong là phải chần xương trước, không nên nấu lửa to..."></textarea>
            </div>
          </div>

          <!-- ĐIỀU KHOẢN & GỬI BÀI -->
          <div class="form-the hieu-ung-tai">
            <div class="form-nhom">
              <label class="dieu-khoan-nhan">
                <input type="checkbox" id="dong-y-dieu-khoan" required />
                <span>Tôi đồng ý với <a href="#" style="color:var(--mau-do-gach);">điều khoản sử dụng</a> của BẾP VIỆT và xác nhận đây là công thức do tôi tự sáng tạo hoặc có quyền chia sẻ.</span>
              </label>
              <span class="form-thong-bao-loi" id="loi-dieu-khoan">Vui lòng đồng ý với điều khoản sử dụng</span>
            </div>

            <div class="nut-hanh-dong">
              <button type="button" id="nut-xem-truoc" class="nut nut-thu-cap">
                👁️ Xem trước công thức
              </button>
              <button type="button" id="nut-dang" class="nut nut-chinh">
                🚀 Đăng công thức
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- CỘT PHẢI: HƯỚNG DẪN -->
      <div>
        <div class="huong-dan-the hieu-ung-tai">
          <div class="huong-dan-tieu-de">📋 Hướng dẫn đăng công thức</div>

          <div class="huong-dan-buoc">
            <div class="huong-dan-so">1</div>
            <span>Điền đầy đủ thông tin cơ bản về món ăn của bạn</span>
          </div>
          <div class="huong-dan-buoc">
            <div class="huong-dan-so">2</div>
            <span>Tải lên hình ảnh món ăn rõ nét, hấp dẫn</span>
          </div>
          <div class="huong-dan-buoc">
            <div class="huong-dan-so">3</div>
            <span>Liệt kê đầy đủ nguyên liệu và số lượng cụ thể</span>
          </div>
          <div class="huong-dan-buoc">
            <div class="huong-dan-so">4</div>
            <span>Mô tả chi tiết từng bước chế biến</span>
          </div>
          <div class="huong-dan-buoc">
            <div class="huong-dan-so">5</div>
            <span>Thêm mẹo nấu ăn để công thức thêm giá trị</span>
          </div>
          <div class="huong-dan-buoc">
            <div class="huong-dan-so">6</div>
            <span>Nhấn "Đăng công thức" và chờ duyệt bài</span>
          </div>

          <hr class="phan-cach" style="margin:1rem 0;" />

          <div style="font-size:0.85rem;font-weight:700;margin-bottom:8px;">💪 Lợi ích khi chia sẻ</div>
          <ul style="font-size:0.82rem;color:var(--mau-chu-phu);">
            <li style="padding:4px 0;">✅ Lan tỏa công thức đến hàng nghìn người</li>
            <li style="padding:4px 0;">✅ Nhận đánh giá và phản hồi từ cộng đồng</li>
            <li style="padding:4px 0;">✅ Xây dựng tên tuổi trong cộng đồng ẩm thực</li>
            <li style="padding:4px 0;">✅ Lưu giữ hương vị Việt cho thế hệ sau</li>
          </ul>

          <hr class="phan-cach" style="margin:1rem 0;" />

          <div style="background:var(--mau-do-nhat);border-radius:var(--bo-vua);padding:var(--khoang-sm);font-size:0.82rem;color:var(--mau-do-gach-dam);">
            ⚠️ <strong>Lưu ý:</strong> Công thức sẽ được BẾP VIỆT kiểm duyệt trước khi hiển thị công khai. Thời gian duyệt bài thường trong vòng 24 giờ.
          </div>
        </div>

        <!-- Tiến trình hoàn thành -->
        <div style="background:white;border-radius:var(--bo-lon);padding:var(--khoang-md);box-shadow:var(--bong-nhe);border:1px solid var(--mau-vien-nhat);margin-top:var(--khoang-md);" class="hieu-ung-tai">
          <div style="font-size:0.9rem;font-weight:700;margin-bottom:var(--khoang-sm);">📊 Tiến trình hoàn thành</div>
          <div style="background:var(--mau-vien);border-radius:var(--bo-tron);height:8px;overflow:hidden;margin-bottom:6px;">
            <div id="thanh-tien-trinh" style="height:100%;background:linear-gradient(90deg,var(--mau-do-gach),var(--mau-vang-cam));border-radius:var(--bo-tron);width:0%;transition:width 0.5s;"></div>
          </div>
          <div id="phan-tram-tien-trinh" style="font-size:0.82rem;color:var(--mau-chu-phu);">0% hoàn thành</div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- FOOTER -->
<footer>
  <div class="container">
    <div class="footer-noi-dung">
      <div>
        <div class="footer-logo">
          <div class="logo-bieu-tuong">🍜</div>
          <div class="logo-ten">
            <span class="logo-ten-chinh">BẾP VIỆT</span>
            <span class="logo-ten-phu">Hương vị quê hương</span>
          </div>
        </div>
        <p class="footer-mo-ta">Nền tảng chia sẻ công thức nấu ăn Việt Nam hàng đầu.</p>
        <div class="footer-mang-xa-hoi">
          <a href="#" class="footer-mxh-nut">📘</a>
          <a href="#" class="footer-mxh-nut">📺</a>
          <a href="#" class="footer-mxh-nut">📸</a>
        </div>
      </div>
      <div>
        <h4 class="footer-tieu-de">Khám phá</h4>
        <ul class="footer-danh-sach">
          <li><a href="kham-pha.php?loai=mien-bac">Món ăn miền Bắc</a></li>
          <li><a href="kham-pha.php?loai=mien-trung">Món ăn miền Trung</a></li>
          <li><a href="kham-pha.php?loai=mien-nam">Món ăn miền Nam</a></li>
        </ul>
      </div>
      <div>
        <h4 class="footer-tieu-de">Cộng đồng</h4>
        <ul class="footer-danh-sach">
          <li><a href="chia-se.php">Chia sẻ công thức</a></li>
          <li><a href="tai-khoan.php">Đăng ký tài khoản</a></li>
        </ul>
      </div>
      <div>
        <h4 class="footer-tieu-de">Hỗ trợ</h4>
        <ul class="footer-danh-sach">
          <li><a href="#">Về BẾP VIỆT</a></li>
          <li><a href="#">Liên hệ</a></li>
        </ul>
      </div>
    </div>
  </div>
  <hr class="footer-duong-ngang" />
  <div class="container">
    <div class="footer-ban-quyen">
      <span>© 2026 BẾP VIỆT. Tất cả quyền được bảo lưu.</span>
      <span>🌾 Giữ hồn ẩm thực Việt – Lan tỏa vị ngon quê nhà</span>
    </div>
  </div>
</footer>

<button class="nut-cuon-len" id="nut-cuon-len" title="Lên đầu trang">↑</button>
<div class="thong-bao-container" id="thong-bao-container"></div>

<script src="js/main.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    window.BepViet.khoiTaoFormChiaSe();
    khoiTaoTienTrinh();
  });

  function khoiTaoTienTrinh() {
    const truong = ['ten-mon-an', 'gioi-thieu-mon', 'vung-mien', 'danh-muc', 'thoi-gian-chuan-bi', 'thoi-gian-nau', 'khau-phan'];
    const thanh = document.getElementById('thanh-tien-trinh');
    const nhan = document.getElementById('phan-tram-tien-trinh');

    function capNhat() {
      const daDien = truong.filter(id => {
        const el = document.getElementById(id);
        return el && el.value.trim();
      }).length;
      const pct = Math.round((daDien / truong.length) * 100);
      if (thanh) thanh.style.width = pct + '%';
      if (nhan) nhan.textContent = pct + '% hoàn thành';
    }

    truong.forEach(id => {
      const el = document.getElementById(id);
      if (el) el.addEventListener('input', capNhat);
    });
  }
</script>
</body>
</html>
