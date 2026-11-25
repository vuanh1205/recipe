<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Phở Bò Hà Nội – Công Thức Chi Tiết | BẾP VIỆT';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= escapeHtml($pageTitle) ?></title>
  <meta name="description" content="Hướng dẫn nấu Phở Bò Hà Nội đúng chuẩn với nước dùng trong vắt, ngọt tự nhiên từ xương bò. Bí quyết từ đầu bếp Hà Nội." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    .cong-thuc-trang {
      padding-top: 70px;
    }

    .breadcrumb {
      background: white;
      padding: 12px 0;
      border-bottom: 1px solid var(--mau-vien);
      font-size: 0.85rem;
      color: var(--mau-chu-phu);
    }

    .breadcrumb a { color: var(--mau-do-gach); }
    .breadcrumb span { margin: 0 6px; }

    .cong-thuc-noi-dung {
      padding: 2.5rem 0 4rem;
    }

    .cong-thuc-tac-gia {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: var(--khoang-md);
    }

    .tac-gia-anh-lon {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      background: var(--mau-do-gach);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 1rem;
    }

    .tac-gia-thong-tin .ten { font-weight: 600; font-size: 0.95rem; }
    .tac-gia-thong-tin .ngay { font-size: 0.8rem; color: var(--mau-chu-mo); }

    .tuong-tac-nhom {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: var(--khoang-xl);
    }

    .nut-tuong-tac {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 10px 18px;
      border: 1.5px solid var(--mau-vien);
      border-radius: var(--bo-tron);
      background: white;
      font-size: 0.88rem;
      font-weight: 600;
      cursor: pointer;
      transition: all var(--toc-do-nhanh);
      font-family: inherit;
      color: var(--mau-chu-chinh);
    }

    .nut-tuong-tac:hover {
      border-color: var(--mau-do-gach);
      color: var(--mau-do-gach);
      background: var(--mau-do-nhat);
    }

    .nut-tuong-tac.hoat-dong {
      background: var(--mau-do-gach);
      color: white;
      border-color: var(--mau-do-gach);
    }

    .buoc-anh {
      width: 100%;
      aspect-ratio: 16/7;
      object-fit: cover;
      border-radius: var(--bo-vua);
      margin-top: 10px;
    }

    .cong-thuc-phan-tieu-de {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 1.3rem;
      font-weight: 800;
      color: var(--mau-chu-chinh);
      margin-bottom: var(--khoang-lg);
      padding-bottom: var(--khoang-md);
      border-bottom: 2px solid var(--mau-do-gach);
    }

    .cong-thuc-phan-tieu-de::before {
      content: '';
      width: 4px;
      height: 24px;
      background: var(--mau-do-gach);
      border-radius: 2px;
    }

    .danh-gia-tong-the {
      background: white;
      border-radius: var(--bo-vua);
      padding: var(--khoang-md);
      display: flex;
      align-items: center;
      gap: var(--khoang-lg);
      margin-bottom: var(--khoang-lg);
      border: 1px solid var(--mau-vien-nhat);
    }

    .danh-gia-so-lon {
      font-size: 3.5rem;
      font-weight: 800;
      color: var(--mau-do-gach);
      line-height: 1;
    }

    .danh-gia-chi-tiet {
      flex: 1;
    }

    .danh-gia-thanh {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 4px;
      font-size: 0.82rem;
    }

    .thanh-tien-do {
      flex: 1;
      height: 6px;
      background: var(--mau-vien);
      border-radius: 3px;
      overflow: hidden;
    }

    .thanh-tien-do-noi {
      height: 100%;
      background: var(--mau-vang-sao);
      border-radius: 3px;
    }

    .mon-lien-quan-luoi {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: var(--khoang-md);
    }

    @media (max-width: 768px) {
      .mon-lien-quan-luoi { grid-template-columns: 1fr 1fr; }
      .cong-thuc-layout { grid-template-columns: 1fr; }
      .danh-gia-tong-the { flex-direction: column; align-items: flex-start; }
    }

    @media (max-width: 480px) {
      .mon-lien-quan-luoi { grid-template-columns: 1fr; }
    }

    .sao-tuong-tac {
      font-size: 1.8rem;
      cursor: pointer;
      transition: transform var(--toc-do-nhanh);
    }

    .sao-tuong-tac:hover {
      transform: scale(1.2);
    }
  </style>
</head>
<body class="cong-thuc-trang">

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
      <li><a href="kham-pha.php" class="nav-lien-ket hoat-dong">Khám phá món ngon</a></li>
      <li><a href="kham-pha.php?mien=ba-mien" class="nav-lien-ket">Ẩm thực ba miền</a></li>
      <li><a href="chia-se.php" class="nav-lien-ket">Chia sẻ công thức</a></li>
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

<!-- BREADCRUMB -->
<div class="breadcrumb">
  <div class="container-sm">
    <a href="index.php">Trang chủ</a>
    <span>›</span>
    <a href="kham-pha.php">Khám phá món ngon</a>
    <span>›</span>
    <a href="kham-pha.php?loai=mien-bac">Món ăn miền Bắc</a>
    <span>›</span>
    <span style="color:var(--mau-chu-chinh);">Phở Bò Hà Nội</span>
  </div>
</div>

<!-- NỘI DUNG CHÍNH -->
<main class="cong-thuc-noi-dung">
  <div class="container-sm">
    <div class="cong-thuc-layout">

      <!-- CỘT TRÁI: NỘI DUNG CHÍNH -->
      <div class="cong-thuc-noi-dung-trai">

        <!-- TIÊU ĐỀ -->
        <div class="cong-thuc-tieu-de hieu-ung-tai">
          <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:10px;">
            <span class="huy-hieu huy-hieu-do">🏔️ Miền Bắc</span>
            <span class="huy-hieu huy-hieu-xam">🏠 Món ăn gia đình</span>
            <span class="huy-hieu huy-hieu-vang">⭐ Món nổi bật</span>
          </div>
          <h1>Phở Bò Hà Nội</h1>
          <p style="color:var(--mau-chu-phu);margin-top:6px;font-size:0.95rem;">Món phở bò truyền thống Hà Nội thơm ngon với nước dùng trong vắt, ngọt tự nhiên từ xương bò hầm lâu.</p>
        </div>

        <!-- TÁC GIẢ & ĐÁNH GIÁ -->
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:var(--khoang-md);" class="hieu-ung-tai">
          <div class="cong-thuc-tac-gia">
            <div class="tac-gia-anh-lon">BV</div>
            <div class="tac-gia-thong-tin">
              <div class="ten">Bếp Việt chính thức</div>
              <div class="ngay">Đăng ngày 15 tháng 3, 2026 • 2.4K lượt xem</div>
            </div>
          </div>
          <div class="danh-gia-sao">
            <span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span>
            <strong style="font-size:1rem;margin-left:4px;">4.9</strong>
            <span class="danh-gia-so">(248 đánh giá)</span>
          </div>
        </div>

        <!-- HÌNH ẢNH -->
        <div class="cong-thuc-anh-chinh hieu-ung-tai">
          <img src="images/pho-bo.png" alt="Phở Bò Hà Nội" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=800&q=80'" />
        </div>

        <!-- THÔNG SỐ CHÍNH -->
        <div class="cong-thuc-meta hieu-ung-tai">
          <div class="meta-muc">
            <div class="meta-gia-tri">30 phút</div>
            <div class="meta-nhan">⏱️ Chuẩn bị</div>
          </div>
          <div class="meta-duong-ngang"></div>
          <div class="meta-muc">
            <div class="meta-gia-tri">2.5 giờ</div>
            <div class="meta-nhan">🔥 Nấu</div>
          </div>
          <div class="meta-duong-ngang"></div>
          <div class="meta-muc">
            <div class="meta-gia-tri">4 người</div>
            <div class="meta-nhan">🍽️ Khẩu phần</div>
          </div>
          <div class="meta-duong-ngang"></div>
          <div class="meta-muc">
            <div class="meta-gia-tri">Trung bình</div>
            <div class="meta-nhan">👨‍🍳 Độ khó</div>
          </div>
          <div class="meta-duong-ngang"></div>
          <div class="meta-muc">
            <div class="meta-gia-tri">520 kcal</div>
            <div class="meta-nhan">🔋 Mỗi suất</div>
          </div>
        </div>

        <!-- MÔ TẢ -->
        <div class="cong-thuc-mo-ta hieu-ung-tai">
          <p>
            <strong>Phở bò Hà Nội</strong> là biểu tượng ẩm thực của thủ đô, được nấu từ xương bò hầm nhiều giờ cùng các loại
            gia vị đặc trưng như hoa hồi, quế, thảo quả, đinh hương. Nước dùng phải trong vắt, có vị ngọt tự nhiên mà không cần
            nhiều bột ngọt. Thịt bò tươi thái mỏng được chần qua nước dùng sôi, mềm vừa phải. Phở ngon phụ thuộc vào bí quyết
            nướng gừng và hành tây đúng cách trước khi ninh xương.
          </p>
        </div>

        <!-- TƯƠNG TÁC -->
        <div class="tuong-tac-nhom hieu-ung-tai">
          <button class="nut-tuong-tac" id="nut-luu-yeu-thich" onclick="luuYeuThich(this)">
            🤍 Lưu công thức
          </button>
          <button class="nut-tuong-tac" onclick="chiaSe()">
            📤 Chia sẻ
          </button>
          <button class="nut-tuong-tac" onclick="inCongThuc()">
            🖨️ In công thức
          </button>
        </div>

        <!-- NGUYÊN LIỆU (di động – hiện trước) -->
        <div class="nguyen-lieu-the" style="display:none;" id="nguyen-lieu-mobile">
        </div>

        <!-- CÁC BƯỚC THỰC HIỆN -->
        <div class="hieu-ung-tai">
          <div class="cong-thuc-phan-tieu-de">Các bước thực hiện</div>

          <div class="buoc-the">
            <div class="buoc-so">1</div>
            <div class="buoc-noi-dung">
              <h4>Sơ chế xương bò và thịt bò</h4>
              <p>
                Rửa sạch 1kg xương ống bò, chặt thành đoạn vừa. Chần xương qua nước sôi có gừng và muối trong 5 phút để loại bỏ bọt bẩn.
                Vớt ra, rửa lại dưới vòi nước lạnh. Thịt bò 300g rửa sạch, để ráo. Thịt nạm 200g thái miếng lớn.
              </p>
              <img src="images/pho-bo.png" alt="Sơ chế xương bò" class="buoc-anh" onerror="this.style.display='none'" />
            </div>
          </div>

          <div class="buoc-the">
            <div class="buoc-so">2</div>
            <div class="buoc-noi-dung">
              <h4>Nướng gừng và hành tây tạo hương thơm</h4>
              <p>
                Dùng lửa bếp gas hoặc than hoa, nướng 1 củ gừng (khoảng 100g) và 2 củ hành tây cả vỏ đến khi bề mặt cháy xém
                và có mùi thơm đặc trưng. Cạo bỏ lớp cháy bên ngoài, giữ lại phần ruột thơm. Bước này quyết định hương vị đặc biệt của nước dùng.
              </p>
            </div>
          </div>

          <div class="buoc-the">
            <div class="buoc-so">3</div>
            <div class="buoc-noi-dung">
              <h4>Rang thơm các loại gia vị</h4>
              <p>
                Cho vào chảo khô: 3 hoa hồi, 1 thanh quế nhỏ, 2 thảo quả, 5 đinh hương. Rang trên lửa vừa đến khi dậy mùi thơm (khoảng 2-3 phút).
                Cho gia vị vào túi vải lọc để dễ vớt ra sau. Không rang quá lâu sẽ làm gia vị bị đắng.
              </p>
            </div>
          </div>

          <div class="buoc-the">
            <div class="buoc-so">4</div>
            <div class="buoc-noi-dung">
              <h4>Ninh xương lấy nước dùng</h4>
              <p>
                Cho xương vào nồi lớn, đổ 3 lít nước lạnh. Thêm gừng nướng, hành tây nướng và túi gia vị vào. Đun sôi mạnh,
                hớt bọt liên tục trong 10 phút đầu. Hạ lửa nhỏ, ninh trong 2-2.5 giờ. Thêm thịt nạm sau 1 giờ đầu.
                Nêm 2 thìa nước mắm ngon, 1 thìa đường phèn, muối vừa ăn.
              </p>
              <img src="images/bun-cha.png" alt="Ninh xương" class="buoc-anh" onerror="this.style.display='none'" />
            </div>
          </div>

          <div class="buoc-the">
            <div class="buoc-so">5</div>
            <div class="buoc-noi-dung">
              <h4>Nêm nếm và lọc nước dùng</h4>
              <p>
                Nếm lại nước dùng, thêm nước mắm, muối, đường phèn cho vừa miệng. Nước phở ngon phải có vị ngọt thanh,
                mặn vừa, không được quá ngậy. Lọc qua rây hoặc vải mùng để nước dùng thật trong. Giữ nước dùng sôi nhẹ trên bếp.
              </p>
            </div>
          </div>

          <div class="buoc-the">
            <div class="buoc-so">6</div>
            <div class="buoc-noi-dung">
              <h4>Chuẩn bị bánh phở và thịt bò tái</h4>
              <p>
                Bánh phở tươi 500g trụng qua nước sôi, cho ra tô. Thịt bò tái 300g thái mỏng (đông lạnh 30 phút để thái dễ hơn).
                Thịt nạm đã chín thái mỏng. Hành lá, rau thơm, giá đỗ sắp ra đĩa. Hành tây thái mỏng ngâm giấm.
              </p>
            </div>
          </div>

          <div class="buoc-the" style="border-bottom:none;">
            <div class="buoc-so">7</div>
            <div class="buoc-noi-dung">
              <h4>Chan nước dùng và hoàn thiện món ăn</h4>
              <p>
                Cho bánh phở vào tô, xếp thịt tái và thịt nạm lên trên. Chan nước dùng đang sôi lên thật đẫm để thịt tái chín vừa.
                Rắc hành lá, hành tây, tiêu đen. Dùng kèm với giá đỗ, rau thơm, chanh, ớt tươi và nước tương hoisin.
                Phở ngon nhất khi ăn nóng ngay sau khi chan nước dùng!
              </p>
              <img src="images/pho-bo.png" alt="Phở bò Hà Nội hoàn thành" class="buoc-anh" onerror="this.style.display='none'" />
            </div>
          </div>
        </div>

        <!-- MẸO NẤU ĂN -->
        <div class="meo-the hieu-ung-tai">
          <div class="meo-tieu-de">💡 Mẹo nấu ăn từ đầu bếp</div>
          <ul class="meo-danh-sach">
            <li>Chần xương qua nước sôi trước khi ninh giúp nước dùng trong và không có mùi hôi.</li>
            <li>Nướng gừng và hành tây đến khi cháy xém (không phải cháy đen) mới cho vào nồi để tạo màu và hương đặc trưng.</li>
            <li>Ninh lửa nhỏ liu riu thay vì sôi mạnh giúp nước dùng trong và xương tiết ngọt từ từ.</li>
            <li>Thịt bò tái nên thái thật mỏng và chỉ chan nước dùng sôi, không để thịt chín quá sẽ bị dai.</li>
            <li>Thêm một chút đường phèn thay vì đường cát giúp vị ngọt thanh hơn, không ngọt gắt.</li>
            <li>Nước dùng thừa có thể để tủ lạnh dùng trong 3 ngày hoặc đông lạnh đến 1 tháng.</li>
          </ul>
        </div>

        <!-- ĐÁNH GIÁ -->
        <div class="hieu-ung-tai">
          <div class="cong-thuc-phan-tieu-de">Đánh giá & Nhận xét</div>

          <div class="danh-gia-tong-the">
            <div>
              <div class="danh-gia-so-lon">4.9</div>
              <div class="danh-gia-sao" style="justify-content:flex-start;">
                <span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span>
              </div>
              <div style="font-size:0.8rem;color:var(--mau-chu-mo);margin-top:4px;">248 đánh giá</div>
            </div>
            <div class="danh-gia-chi-tiet">
              <div class="danh-gia-thanh"><span>5 ⭐</span><div class="thanh-tien-do"><div class="thanh-tien-do-noi" style="width:85%"></div></div><span>85%</span></div>
              <div class="danh-gia-thanh"><span>4 ⭐</span><div class="thanh-tien-do"><div class="thanh-tien-do-noi" style="width:10%"></div></div><span>10%</span></div>
              <div class="danh-gia-thanh"><span>3 ⭐</span><div class="thanh-tien-do"><div class="thanh-tien-do-noi" style="width:3%"></div></div><span>3%</span></div>
              <div class="danh-gia-thanh"><span>2 ⭐</span><div class="thanh-tien-do"><div class="thanh-tien-do-noi" style="width:1%"></div></div><span>1%</span></div>
              <div class="danh-gia-thanh"><span>1 ⭐</span><div class="thanh-tien-do"><div class="thanh-tien-do-noi" style="width:1%"></div></div><span>1%</span></div>
            </div>
          </div>

          <!-- Đánh giá sao tương tác -->
          <div style="background:var(--mau-kem);border-radius:var(--bo-vua);padding:var(--khoang-md);margin-bottom:var(--khoang-lg);text-align:center;">
            <p style="font-weight:600;margin-bottom:10px;">Bạn đã thử nấu món này chưa? Hãy đánh giá nhé!</p>
            <div id="danh-gia-sao-tuong-tac" style="display:flex;justify-content:center;gap:4px;">
              <span class="sao-tuong-tac">☆</span>
              <span class="sao-tuong-tac">☆</span>
              <span class="sao-tuong-tac">☆</span>
              <span class="sao-tuong-tac">☆</span>
              <span class="sao-tuong-tac">☆</span>
            </div>
          </div>
        </div>

        <!-- BÌNH LUẬN -->
        <div class="hieu-ung-tai">
          <div class="cong-thuc-phan-tieu-de">Bình luận (12)</div>

          <div class="binh-luan-o-nhap">
            <div class="avatar-placeholder">BV</div>
            <div style="flex:1;">
              <textarea placeholder="Chia sẻ cảm nhận của bạn về món ăn này..." rows="3"></textarea>
              <div style="text-align:right;margin-top:8px;">
                <button class="nut nut-chinh nut-nho" onclick="guiBinhLuan()">Gửi bình luận</button>
              </div>
            </div>
          </div>

          <div class="binh-luan-muc">
            <div class="avatar-placeholder" style="width:42px;height:42px;font-size:0.85rem;">TH</div>
            <div class="binh-luan-noi-dung">
              <div class="binh-luan-ten">Trần Thị Hoa <span style="font-weight:400;color:var(--mau-chu-mo);font-size:0.8rem;">⭐⭐⭐⭐⭐</span></div>
              <div class="binh-luan-noidung">Mình đã nấu theo công thức này và kết quả tuyệt vời! Nước dùng trong vắt, ngọt tự nhiên y chang phở Hà Nội thật. Mẹo nướng gừng và hành tây rất quan trọng, mình đã làm đúng và khác hẳn các lần nấu trước. Cảm ơn BẾP VIỆT!</div>
              <div class="binh-luan-thoigian">2 ngày trước • <span style="color:var(--mau-do-gach);cursor:pointer;">👍 Hữu ích (24)</span></div>
            </div>
          </div>

          <div class="binh-luan-muc">
            <div class="avatar-placeholder" style="width:42px;height:42px;font-size:0.85rem;">NV</div>
            <div class="binh-luan-noi-dung">
              <div class="binh-luan-ten">Nguyễn Văn Minh <span style="font-weight:400;color:var(--mau-chu-mo);font-size:0.8rem;">⭐⭐⭐⭐⭐</span></div>
              <div class="binh-luan-noidung">Lần đầu nấu phở mà được khen ngon lắm! Con bé nhà mình rất thích. Mình ninh xương đến 3 tiếng nước dùng ngọt lịm. Sẽ làm thêm nhiều lần nữa.</div>
              <div class="binh-luan-thoigian">5 ngày trước • <span style="color:var(--mau-do-gach);cursor:pointer;">👍 Hữu ích (18)</span></div>
            </div>
          </div>

          <div class="binh-luan-muc">
            <div class="avatar-placeholder" style="width:42px;height:42px;font-size:0.85rem;">LA</div>
            <div class="binh-luan-noi-dung">
              <div class="binh-luan-ten">Lê Thị Ánh <span style="font-weight:400;color:var(--mau-chu-mo);font-size:0.8rem;">⭐⭐⭐⭐☆</span></div>
              <div class="binh-luan-noidung">Ngon lắm! Chỉ có điều mình dùng thịt bò đông lạnh nên thái không được mỏng lắm. Lần sau mình sẽ mua thịt tươi ngay buổi sáng. Nước dùng rất thơm!</div>
              <div class="binh-luan-thoigian">1 tuần trước • <span style="color:var(--mau-do-gach);cursor:pointer;">👍 Hữu ích (11)</span></div>
            </div>
          </div>

          <div style="text-align:center;margin-top:var(--khoang-md);">
            <button class="nut nut-thu-cap nut-nho">Xem thêm bình luận</button>
          </div>
        </div>

        <!-- MÓN LIÊN QUAN -->
        <div class="hieu-ung-tai" style="margin-top:var(--khoang-xl);">
          <div class="cong-thuc-phan-tieu-de">Món ăn liên quan</div>
          <div class="mon-lien-quan-luoi">
            <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
              <div class="the-mon-an-anh">
                <img src="images/bun-cha.png" alt="Bún chả" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=400&q=80'" />
              </div>
              <div class="the-mon-an-noi-dung">
                <h3 class="the-mon-an-ten">Bún Chả Hà Nội</h3>
                <div class="the-mon-an-thong-tin"><span class="thong-tin-muc">⏱️ 1 giờ</span></div>
                <div class="the-mon-an-chan"><div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span></div><a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem</a></div>
              </div>
            </div>
            <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
              <div class="the-mon-an-anh">
                <img src="images/pho-bo.png" alt="Phở gà" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=400&q=80'" />
              </div>
              <div class="the-mon-an-noi-dung">
                <h3 class="the-mon-an-ten">Phở Gà</h3>
                <div class="the-mon-an-thong-tin"><span class="thong-tin-muc">⏱️ 2 giờ</span></div>
                <div class="the-mon-an-chan"><div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span></div><a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem</a></div>
              </div>
            </div>
            <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
              <div class="the-mon-an-anh">
                <img src="images/mi-quang.png" alt="Bún riêu" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&q=80'" />
              </div>
              <div class="the-mon-an-noi-dung">
                <h3 class="the-mon-an-ten">Bún Riêu Cua</h3>
                <div class="the-mon-an-thong-tin"><span class="thong-tin-muc">⏱️ 1.5 giờ</span></div>
                <div class="the-mon-an-chan"><div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span></div><a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- CỘT PHẢI: NGUYÊN LIỆU -->
      <div>
        <div class="nguyen-lieu-the hieu-ung-tai">
          <div class="nguyen-lieu-tieu-de">🛒 Nguyên liệu cần chuẩn bị</div>

          <div style="background:var(--mau-kem);border-radius:var(--bo-nho);padding:8px 12px;font-size:0.82rem;color:var(--mau-chu-phu);margin-bottom:var(--khoang-md);">
            Khẩu phần: <strong style="color:var(--mau-do-gach);">4 người</strong>
          </div>

          <div style="font-size:0.85rem;font-weight:700;color:var(--mau-chu-phu);margin-bottom:8px;text-transform:uppercase;letter-spacing:0.5px;">Xương & Thịt</div>
          <ul class="nguyen-lieu-danh-sach">
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Xương ống bò</span><span class="nguyen-lieu-luong">1 kg</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Thịt bò nạm</span><span class="nguyen-lieu-luong">200 g</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Thịt bò tái (thăn nội)</span><span class="nguyen-lieu-luong">300 g</span></li>
          </ul>

          <div style="font-size:0.85rem;font-weight:700;color:var(--mau-chu-phu);margin:var(--khoang-md) 0 8px;text-transform:uppercase;letter-spacing:0.5px;">Bánh phở & Rau</div>
          <ul class="nguyen-lieu-danh-sach">
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Bánh phở tươi</span><span class="nguyen-lieu-luong">500 g</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Hành lá</span><span class="nguyen-lieu-luong">3 cây</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Giá đỗ</span><span class="nguyen-lieu-luong">200 g</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Rau thơm (húng quế, ngò gai)</span><span class="nguyen-lieu-luong">1 bó</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Hành tây</span><span class="nguyen-lieu-luong">2 củ</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Chanh tươi</span><span class="nguyen-lieu-luong">2 quả</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Ớt tươi</span><span class="nguyen-lieu-luong">3 quả</span></li>
          </ul>

          <div style="font-size:0.85rem;font-weight:700;color:var(--mau-chu-phu);margin:var(--khoang-md) 0 8px;text-transform:uppercase;letter-spacing:0.5px;">Gia vị nước dùng</div>
          <ul class="nguyen-lieu-danh-sach">
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Gừng tươi</span><span class="nguyen-lieu-luong">1 củ (100g)</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Hoa hồi</span><span class="nguyen-lieu-luong">3 tai</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Quế chi</span><span class="nguyen-lieu-luong">1 thanh</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Thảo quả</span><span class="nguyen-lieu-luong">2 quả</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Đinh hương</span><span class="nguyen-lieu-luong">5 cái</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Nước mắm ngon</span><span class="nguyen-lieu-luong">3 thìa canh</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Đường phèn</span><span class="nguyen-lieu-luong">1 thìa canh</span></li>
            <li><span class="nguyen-lieu-diem"></span><span class="nguyen-lieu-ten">Muối</span><span class="nguyen-lieu-luong">Vừa ăn</span></li>
          </ul>

          <div style="margin-top:var(--khoang-md);padding-top:var(--khoang-md);border-top:1px solid var(--mau-vien);">
            <button class="nut nut-chinh nut-block" onclick="window.BepViet.hienThongBao('✅ Đã lưu danh sách nguyên liệu!', 'thanh-cong')">
              🛒 Lưu danh sách mua sắm
            </button>
          </div>
        </div>

        <!-- Thông tin dinh dưỡng -->
        <div style="background:white;border-radius:var(--bo-lon);padding:var(--khoang-md);box-shadow:var(--bong-nhe);border:1px solid var(--mau-vien-nhat);margin-top:var(--khoang-md);">
          <div style="font-size:0.95rem;font-weight:700;margin-bottom:var(--khoang-sm);display:flex;align-items:center;gap:6px;">
            💊 Thông tin dinh dưỡng
            <span style="font-size:0.75rem;font-weight:400;color:var(--mau-chu-mo);">(mỗi suất ăn)</span>
          </div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
            <div style="text-align:center;padding:8px;background:var(--mau-kem);border-radius:var(--bo-nho);">
              <div style="font-size:1.1rem;font-weight:700;color:var(--mau-do-gach);">520</div>
              <div style="font-size:0.72rem;color:var(--mau-chu-mo);">Calo (kcal)</div>
            </div>
            <div style="text-align:center;padding:8px;background:var(--mau-kem);border-radius:var(--bo-nho);">
              <div style="font-size:1.1rem;font-weight:700;color:var(--mau-xanh-la);">28g</div>
              <div style="font-size:0.72rem;color:var(--mau-chu-mo);">Protein</div>
            </div>
            <div style="text-align:center;padding:8px;background:var(--mau-kem);border-radius:var(--bo-nho);">
              <div style="font-size:1.1rem;font-weight:700;color:var(--mau-vang-cam);">65g</div>
              <div style="font-size:0.72rem;color:var(--mau-chu-mo);">Tinh bột</div>
            </div>
            <div style="text-align:center;padding:8px;background:var(--mau-kem);border-radius:var(--bo-nho);">
              <div style="font-size:1.1rem;font-weight:700;color:var(--mau-chu-phu);">12g</div>
              <div style="font-size:0.72rem;color:var(--mau-chu-mo);">Chất béo</div>
            </div>
          </div>
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
    window.BepViet.khoiTaoDanhGiaSao();
  });

  function luuYeuThich(nut) {
    nut.classList.toggle('hoat-dong');
    if (nut.classList.contains('hoat-dong')) {
      nut.textContent = '❤️ Đã lưu';
      window.BepViet.hienThongBao('✅ Đã lưu "Phở Bò Hà Nội" vào yêu thích!', 'thanh-cong');
    } else {
      nut.textContent = '🤍 Lưu công thức';
      window.BepViet.hienThongBao('💔 Đã xóa khỏi yêu thích.', 'canh-bao');
    }
  }

  function chiaSe() {
    if (navigator.share) {
      navigator.share({ title: 'Phở Bò Hà Nội – BẾP VIỆT', url: window.location.href });
    } else {
      navigator.clipboard.writeText(window.location.href).then(() => {
        window.BepViet.hienThongBao('📋 Đã sao chép đường dẫn công thức!', 'thanh-cong');
      });
    }
  }

  function inCongThuc() {
    window.BepViet.hienThongBao('🖨️ Đang chuẩn bị in công thức...', 'thanh-cong');
    setTimeout(() => window.print(), 500);
  }

  function guiBinhLuan() {
    const textarea = document.querySelector('.binh-luan-o-nhap textarea');
    if (textarea && textarea.value.trim()) {
      window.BepViet.hienThongBao('✅ Bình luận của bạn đã được gửi!', 'thanh-cong');
      textarea.value = '';
    } else {
      window.BepViet.hienThongBao('⚠️ Vui lòng nhập nội dung bình luận!', 'loi');
    }
  }
</script>
</body>
</html>
