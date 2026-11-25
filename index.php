<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'BẾP VIỆT – Giữ hồn ẩm thực Việt, Lan tỏa vị ngon quê nhà';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= escapeHtml($pageTitle) ?></title>
  <meta name="description" content="Khám phá hàng trăm công thức nấu ăn Việt Nam từ ba miền Bắc – Trung – Nam. Từ món ăn dân dã đến đặc sản nổi tiếng, BẾP VIỆT là nơi lưu giữ và chia sẻ hương vị quê hương." />
  <meta property="og:title" content="BẾP VIỆT – Chia sẻ công thức nấu ăn Việt Nam" />
  <meta property="og:description" content="Khám phá và chia sẻ công thức nấu ăn Việt Nam truyền thống và hiện đại." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    /* Styles đặc biệt cho trang chủ */
    .mon-moi-luoi {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1.5rem;
    }
    @media (max-width: 1024px) { .mon-moi-luoi { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 480px) { .mon-moi-luoi { grid-template-columns: 1fr; } }

    .tac-gia-nhom {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.8rem;
      color: var(--mau-chu-phu);
    }
    .tac-gia-anh {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      background: var(--mau-do-gach);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
      font-weight: 700;
    }

    /* Danh mục với animation */
    .danh-muc-luoi .danh-muc-the:nth-child(1) { animation-delay: 0.1s; }
    .danh-muc-luoi .danh-muc-the:nth-child(2) { animation-delay: 0.15s; }
    .danh-muc-luoi .danh-muc-the:nth-child(3) { animation-delay: 0.2s; }
    .danh-muc-luoi .danh-muc-the:nth-child(4) { animation-delay: 0.25s; }
    .danh-muc-luoi .danh-muc-the:nth-child(5) { animation-delay: 0.3s; }
    .danh-muc-luoi .danh-muc-the:nth-child(6) { animation-delay: 0.35s; }

    /* Gradient text */
    .chu-gradient {
      background: linear-gradient(135deg, var(--mau-do-gach), var(--mau-vang-cam));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Section nền đặc biệt */
    .khu-vuc-ba-mien {
      background: linear-gradient(180deg, var(--mau-kem) 0%, white 100%);
    }

    /* Decoration */
    .trang-tri-am-thuc {
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin-top: 1.5rem;
      flex-wrap: wrap;
    }
    .trang-tri-muc {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 0.85rem;
      color: rgba(255,255,255,0.7);
    }
    .trang-tri-muc span:first-child {
      font-size: 1.1rem;
    }

    /* Partners/Features strip */
    .dac-trung-strip {
      background: white;
      border-top: 1px solid var(--mau-vien);
      border-bottom: 1px solid var(--mau-vien);
      padding: 1.5rem 0;
    }
    .dac-trung-noi-dung {
      display: flex;
      align-items: center;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 1rem;
    }
    .dac-trung-muc {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .dac-trung-bieu-tuong {
      font-size: 1.5rem;
    }
    .dac-trung-van-ban h4 {
      font-size: 0.9rem;
      color: var(--mau-chu-chinh);
    }
    .dac-trung-van-ban p {
      font-size: 0.78rem;
      color: var(--mau-chu-mo);
    }
  </style>
</head>
<body>

<!-- ============================================================
  THANH ĐIỀU HƯỚNG
  ============================================================ -->
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
      <li><a href="index.php" class="nav-lien-ket hoat-dong">Trang chủ</a></li>
      <li><a href="kham-pha.php" class="nav-lien-ket">Khám phá món ngon</a></li>
      <li><a href="kham-pha.php?mien=ba-mien" class="nav-lien-ket">Ẩm thực ba miền</a></li>
      <li><a href="chia-se.php" class="nav-lien-ket">Chia sẻ công thức</a></li>
      <li><a href="#gioi-thieu" class="nav-lien-ket">Giới thiệu</a></li>
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

<!-- ============================================================
  HERO BANNER
  ============================================================ -->
<section class="hero" id="trang-chu">
  <div class="hero-anh-nen"></div>
  <div class="hero-lop-phu"></div>

  <div class="hero-noi-dung">
    <div class="hero-nhan">
      🌾 Nền tảng ẩm thực Việt Nam hàng đầu
    </div>
    <h1 class="hero-tieu-de">
      Ẩm thực Việt –
      <span>Hương vị của những yêu thương</span>
    </h1>
    <p class="hero-mo-ta">
      Cùng khám phá hàng trăm công thức nấu ăn Việt Nam, từ những món ăn dân dã
      đến các đặc sản nổi tiếng ba miền Bắc – Trung – Nam.
    </p>

    <form class="hero-tim-kiem" id="hero-tim-kiem">
      <input
        type="text"
        class="hero-tim-kiem-o-nhap"
        id="hero-o-tim-kiem"
        placeholder="🔍  Tìm món ăn bạn muốn nấu..."
        autocomplete="off"
      />
      <button type="submit" class="hero-tim-kiem-nut">
        Tìm kiếm
      </button>
    </form>

    <div class="trang-tri-am-thuc">
      <div class="trang-tri-muc"><span>🍜</span><span>Phở bò Hà Nội</span></div>
      <div class="trang-tri-muc"><span>🥗</span><span>Gỏi cuốn</span></div>
      <div class="trang-tri-muc"><span>🫕</span><span>Bún bò Huế</span></div>
      <div class="trang-tri-muc"><span>🥘</span><span>Bánh xèo</span></div>
      <div class="trang-tri-muc"><span>🐟</span><span>Cá kho tộ</span></div>
    </div>

    <div class="hero-thong-ke">
      <div class="thong-ke-muc">
        <div class="thong-ke-so">500+</div>
        <div class="thong-ke-nhan">Công thức nấu ăn</div>
      </div>
      <div class="thong-ke-muc">
        <div class="thong-ke-so">50K+</div>
        <div class="thong-ke-nhan">Thành viên</div>
      </div>
      <div class="thong-ke-muc">
        <div class="thong-ke-so">3</div>
        <div class="thong-ke-nhan">Vùng miền Việt Nam</div>
      </div>
    </div>
  </div>

  <div class="hero-cuon-xuong">
    <span>↓</span>
    <span style="font-size:0.7rem;">Cuộn xuống</span>
  </div>
</section>

<!-- ============================================================
  ĐẶC TRƯNG NỔI BẬT
  ============================================================ -->
<div class="dac-trung-strip">
  <div class="container">
    <div class="dac-trung-noi-dung">
      <div class="dac-trung-muc">
        <div class="dac-trung-bieu-tuong">🏆</div>
        <div class="dac-trung-van-ban">
          <h4>Công thức chất lượng</h4>
          <p>Được kiểm duyệt bởi đầu bếp</p>
        </div>
      </div>
      <div class="dac-trung-muc">
        <div class="dac-trung-bieu-tuong">👨‍🍳</div>
        <div class="dac-trung-van-ban">
          <h4>Cộng đồng sôi động</h4>
          <p>Hàng nghìn người nấu mỗi ngày</p>
        </div>
      </div>
      <div class="dac-trung-muc">
        <div class="dac-trung-bieu-tuong">📱</div>
        <div class="dac-trung-van-ban">
          <h4>Dễ theo dõi khi nấu</h4>
          <p>Hướng dẫn từng bước rõ ràng</p>
        </div>
      </div>
      <div class="dac-trung-muc">
        <div class="dac-trung-bieu-tuong">🌿</div>
        <div class="dac-trung-van-ban">
          <h4>Nguyên liệu dễ tìm</h4>
          <p>Phù hợp với nguyên liệu địa phương</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ============================================================
  DANH MỤC MÓN ĂN
  ============================================================ -->
<section class="khu-vuc khu-vuc-trang" id="danh-muc">
  <div class="container">
    <div class="tieu-de-khu-vuc hieu-ung-tai">
      <div class="nhan-nho">🗂️ Danh mục</div>
      <h2>Khám phá theo sở thích</h2>
      <p>Tìm kiếm món ăn theo danh mục phù hợp với bữa ăn của gia đình bạn</p>
      <div class="duong-trang-tri"></div>
    </div>

    <div class="danh-muc-luoi hieu-ung-tai">
      <div class="danh-muc-the" data-loai="mien-bac" onclick="window.location.href='kham-pha.php?loai=mien-bac'">
        <div class="danh-muc-bieu-tuong">🍜</div>
        <div class="danh-muc-ten">Món ăn miền Bắc</div>
        <div class="danh-muc-so">128 công thức</div>
      </div>
      <div class="danh-muc-the" data-loai="mien-trung" onclick="window.location.href='kham-pha.php?loai=mien-trung'">
        <div class="danh-muc-bieu-tuong">🌶️</div>
        <div class="danh-muc-ten">Món ăn miền Trung</div>
        <div class="danh-muc-so">95 công thức</div>
      </div>
      <div class="danh-muc-the" data-loai="mien-nam" onclick="window.location.href='kham-pha.php?loai=mien-nam'">
        <div class="danh-muc-bieu-tuong">🥘</div>
        <div class="danh-muc-ten">Món ăn miền Nam</div>
        <div class="danh-muc-so">142 công thức</div>
      </div>
      <div class="danh-muc-the" data-loai="gia-dinh" onclick="window.location.href='kham-pha.php?loai=gia-dinh'">
        <div class="danh-muc-bieu-tuong">🍚</div>
        <div class="danh-muc-ten">Món ăn gia đình</div>
        <div class="danh-muc-so">210 công thức</div>
      </div>
      <div class="danh-muc-the" data-loai="chay" onclick="window.location.href='kham-pha.php?loai=chay'">
        <div class="danh-muc-bieu-tuong">🥬</div>
        <div class="danh-muc-ten">Món ăn chay</div>
        <div class="danh-muc-so">67 công thức</div>
      </div>
      <div class="danh-muc-the" data-loai="trang-miem" onclick="window.location.href='kham-pha.php?loai=trang-miem'">
        <div class="danh-muc-bieu-tuong">🍮</div>
        <div class="danh-muc-ten">Tráng miệng</div>
        <div class="danh-muc-so">58 công thức</div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
  MÓN ĂN NỔI BẬT
  ============================================================ -->
<section class="khu-vuc khu-vuc-kem" id="mon-noi-bat">
  <div class="container">
    <div class="tieu-de-khu-vuc hieu-ung-tai">
      <div class="nhan-nho">⭐ Nổi bật</div>
      <h2>Món ăn được yêu thích nhất</h2>
      <p>Những công thức được cộng đồng BẾP VIỆT đánh giá cao và chia sẻ nhiều nhất</p>
      <div class="duong-trang-tri"></div>
    </div>

    <div class="luoi-mon-an hieu-ung-tai">
      <!-- Phở Bò Hà Nội -->
      <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/pho-bo.png" alt="Phở bò Hà Nội" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=400&q=80'" />
          <div class="the-mon-an-nhan">
            <span class="huy-hieu huy-hieu-do">Miền Bắc</span>
          </div>
          <button class="the-mon-an-yeu-thich" title="Lưu yêu thích">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Hà Nội</div>
          <h3 class="the-mon-an-ten">Phở Bò Hà Nội</h3>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 3 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao">
              <span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span>
              <span class="danh-gia-so">(248)</span>
            </div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <!-- Bún Chả Hà Nội -->
      <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/bun-cha.png" alt="Bún chả Hà Nội" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=400&q=80'" />
          <div class="the-mon-an-nhan">
            <span class="huy-hieu huy-hieu-do">Miền Bắc</span>
          </div>
          <button class="the-mon-an-yeu-thich" title="Lưu yêu thích">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Hà Nội</div>
          <h3 class="the-mon-an-ten">Bún Chả Hà Nội</h3>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
            <span class="thong-tin-muc">🍽️ 2 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao">
              <span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span>
              <span class="danh-gia-so">(189)</span>
            </div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <!-- Bánh Xèo Miền Tây -->
      <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/banh-xeo.png" alt="Bánh xèo miền Tây" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1536304993881-ff86e5b2a7f4?w=400&q=80'" />
          <div class="the-mon-an-nhan">
            <span class="huy-hieu huy-hieu-xanh">Miền Nam</span>
          </div>
          <button class="the-mon-an-yeu-thich" title="Lưu yêu thích">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Đồng bằng sông Cửu Long</div>
          <h3 class="the-mon-an-ten">Bánh Xèo Miền Tây</h3>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 45 phút</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao">
              <span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span>
              <span class="danh-gia-so">(156)</span>
            </div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <!-- Mì Quảng -->
      <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/mi-quang.png" alt="Mì Quảng" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&q=80'" />
          <div class="the-mon-an-nhan">
            <span class="huy-hieu huy-hieu-vang">Miền Trung</span>
          </div>
          <button class="the-mon-an-yeu-thich" title="Lưu yêu thích">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Quảng Nam</div>
          <h3 class="the-mon-an-ten">Mì Quảng</h3>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1.5 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao">
              <span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span>
              <span class="danh-gia-so">(134)</span>
            </div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <!-- Bún Bò Huế -->
      <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/bun-bo-hue.png" alt="Bún bò Huế" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=400&q=80'" />
          <div class="the-mon-an-nhan">
            <span class="huy-hieu huy-hieu-vang">Miền Trung</span>
          </div>
          <button class="the-mon-an-yeu-thich" title="Lưu yêu thích">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Thừa Thiên Huế</div>
          <h3 class="the-mon-an-ten">Bún Bò Huế</h3>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 2 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Khó</span>
            <span class="thong-tin-muc">🍽️ 6 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao">
              <span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span>
              <span class="danh-gia-so">(201)</span>
            </div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <!-- Cá Kho Tộ -->
      <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/ca-kho-to.png" alt="Cá kho tộ" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1563245372-f21724e3856d?w=400&q=80'" />
          <div class="the-mon-an-nhan">
            <span class="huy-hieu huy-hieu-xanh">Miền Nam</span>
          </div>
          <button class="the-mon-an-yeu-thich" title="Lưu yêu thích">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Nam Bộ</div>
          <h3 class="the-mon-an-ten">Cá Kho Tộ</h3>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao">
              <span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span>
              <span class="danh-gia-so">(178)</span>
            </div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>
    </div>

    <div style="text-align:center; margin-top:2.5rem;" class="hieu-ung-tai">
      <a href="kham-pha.php" class="nut nut-thu-cap">
        Xem thêm món ăn →
      </a>
    </div>
  </div>
</section>

<!-- ============================================================
  ẨM THỰC BA MIỀN
  ============================================================ -->
<section class="khu-vuc khu-vuc-trang khu-vuc-ba-mien" id="ba-mien">
  <div class="container">
    <div class="tieu-de-khu-vuc hieu-ung-tai">
      <div class="nhan-nho">🗺️ Khám phá</div>
      <h2>Ẩm thực <span class="chu-gradient">ba miền</span> Việt Nam</h2>
      <p>Mỗi vùng đất mang một hương vị riêng – Hãy cùng khám phá sự đa dạng của ẩm thực Việt</p>
      <div class="duong-trang-tri"></div>
    </div>

    <div class="ba-mien-luoi hieu-ung-tai">
      <!-- Miền Bắc -->
      <div class="mien-the">
        <img src="images/pho-bo.png" alt="Ẩm thực miền Bắc" class="mien-the-anh" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=600&q=80'" />
        <div class="mien-the-lop-phu"></div>
        <div class="mien-the-noi-dung">
          <div class="mien-the-nhan">🏔️ Miền Bắc</div>
          <div class="mien-the-ten">Tinh tế & Đậm đà</div>
          <div class="mien-the-dac-san">
            <span>Phở Hà Nội</span>
            <span>Bún chả</span>
            <span>Chả cá Lã Vọng</span>
            <span>Bánh cuốn Thanh Trì</span>
          </div>
          <a href="kham-pha.php?loai=mien-bac" class="mien-the-nut">
            Khám phá →
          </a>
        </div>
      </div>

      <!-- Miền Trung -->
      <div class="mien-the">
        <img src="images/bun-bo-hue.png" alt="Ẩm thực miền Trung" class="mien-the-anh" onerror="this.src='https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=600&q=80'" />
        <div class="mien-the-lop-phu"></div>
        <div class="mien-the-noi-dung">
          <div class="mien-the-nhan">🌊 Miền Trung</div>
          <div class="mien-the-ten">Cay nồng & Sắc sảo</div>
          <div class="mien-the-dac-san">
            <span>Bún bò Huế</span>
            <span>Mì Quảng</span>
            <span>Cao lầu Hội An</span>
            <span>Bánh bèo Huế</span>
          </div>
          <a href="kham-pha.php?loai=mien-trung" class="mien-the-nut">
            Khám phá →
          </a>
        </div>
      </div>

      <!-- Miền Nam -->
      <div class="mien-the">
        <img src="images/banh-xeo.png" alt="Ẩm thực miền Nam" class="mien-the-anh" onerror="this.src='https://images.unsplash.com/photo-1536304993881-ff86e5b2a7f4?w=600&q=80'" />
        <div class="mien-the-lop-phu"></div>
        <div class="mien-the-noi-dung">
          <div class="mien-the-nhan">🌴 Miền Nam</div>
          <div class="mien-the-ten">Ngọt ngào & Phong phú</div>
          <div class="mien-the-dac-san">
            <span>Hủ tiếu Nam Vang</span>
            <span>Bánh xèo miền Tây</span>
            <span>Cá kho tộ</span>
            <span>Canh chua cá</span>
          </div>
          <a href="kham-pha.php?loai=mien-nam" class="mien-the-nut">
            Khám phá →
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
  MÓN ĂN MỚI NHẤT
  ============================================================ -->
<section class="khu-vuc khu-vuc-kem" id="mon-moi">
  <div class="container">
    <div class="tieu-de-khu-vuc hieu-ung-tai">
      <div class="nhan-nho">🆕 Mới nhất</div>
      <h2>Công thức vừa được chia sẻ</h2>
      <p>Những công thức mới nhất từ cộng đồng BẾP VIỆT</p>
      <div class="duong-trang-tri"></div>
    </div>

    <div class="mon-moi-luoi hieu-ung-tai">
      <!-- Món mới 1 -->
      <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/nem-ran.png" alt="Nem rán" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1563245372-f21724e3856d?w=400&q=80'" />
          <div class="the-mon-an-nhan">
            <span class="huy-hieu huy-hieu-xam">🆕 Mới</span>
          </div>
          <button class="the-mon-an-yeu-thich" title="Lưu yêu thích">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <h3 class="the-mon-an-ten">Nem Rán (Chả Giò)</h3>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="tac-gia-nhom">
              <div class="tac-gia-anh">MH</div>
              <span>Mẹ Hằng</span>
            </div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem</a>
          </div>
        </div>
      </div>

      <!-- Món mới 2 -->
      <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/goi-cuon.png" alt="Gỏi cuốn" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=400&q=80'" />
          <div class="the-mon-an-nhan">
            <span class="huy-hieu huy-hieu-xam">🆕 Mới</span>
          </div>
          <button class="the-mon-an-yeu-thich" title="Lưu yêu thích">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <h3 class="the-mon-an-ten">Gỏi Cuốn Tôm Thịt</h3>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 30 phút</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="tac-gia-nhom">
              <div class="tac-gia-anh">TA</div>
              <span>Thúy Anh</span>
            </div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem</a>
          </div>
        </div>
      </div>

      <!-- Món mới 3 -->
      <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/thit-kho-trung.png" alt="Thịt kho trứng" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&q=80'" />
          <div class="the-mon-an-nhan">
            <span class="huy-hieu huy-hieu-xam">🆕 Mới</span>
          </div>
          <button class="the-mon-an-yeu-thich" title="Lưu yêu thích">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <h3 class="the-mon-an-ten">Thịt Kho Trứng Tàu</h3>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1.5 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="tac-gia-nhom">
              <div class="tac-gia-anh">BL</div>
              <span>Bà Lành</span>
            </div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem</a>
          </div>
        </div>
      </div>

      <!-- Món mới 4 -->
      <div class="the-mon-an" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/che-ba-mau.png" alt="Chè ba màu" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1536304993881-ff86e5b2a7f4?w=400&q=80'" />
          <div class="the-mon-an-nhan">
            <span class="huy-hieu huy-hieu-xam">🆕 Mới</span>
          </div>
          <button class="the-mon-an-yeu-thich" title="Lưu yêu thích">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <h3 class="the-mon-an-ten">Chè Ba Màu</h3>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 45 phút</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="tac-gia-nhom">
              <div class="tac-gia-anh">HN</div>
              <span>Hoa Nguyễn</span>
            </div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
  LỜI MỜI CHIA SẺ
  ============================================================ -->
<section class="chia-se-khu-vuc" id="gioi-thieu">
  <div class="chia-se-noi-dung">
    <div class="chia-se-bieu-tuong">👨‍🍳</div>
    <h2>Mỗi món ăn là một câu chuyện</h2>
    <p>
      Hãy chia sẻ công thức nấu ăn của bạn để cùng mọi người lưu giữ
      và lan tỏa hương vị Việt. Mỗi công thức bạn chia sẻ là một
      kỷ niệm đẹp được lưu truyền mãi mãi.
    </p>
    <a href="chia-se.php" class="chia-se-nut">
      ✍️ Chia sẻ công thức ngay
    </a>
  </div>
</section>

<!-- ============================================================
  FOOTER
  ============================================================ -->
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
        <p class="footer-mo-ta">
          Nền tảng chia sẻ công thức nấu ăn Việt Nam hàng đầu.
          Lưu giữ và lan tỏa hương vị quê hương đến mọi gia đình Việt.
        </p>
        <div class="footer-mang-xa-hoi">
          <a href="#" class="footer-mxh-nut" title="Facebook">📘</a>
          <a href="#" class="footer-mxh-nut" title="YouTube">📺</a>
          <a href="#" class="footer-mxh-nut" title="Instagram">📸</a>
          <a href="#" class="footer-mxh-nut" title="TikTok">🎵</a>
        </div>
      </div>

      <div>
        <h4 class="footer-tieu-de">Khám phá</h4>
        <ul class="footer-danh-sach">
          <li><a href="kham-pha.php?loai=mien-bac">Món ăn miền Bắc</a></li>
          <li><a href="kham-pha.php?loai=mien-trung">Món ăn miền Trung</a></li>
          <li><a href="kham-pha.php?loai=mien-nam">Món ăn miền Nam</a></li>
          <li><a href="kham-pha.php?loai=chay">Món ăn chay</a></li>
          <li><a href="kham-pha.php?loai=trang-miem">Tráng miệng</a></li>
        </ul>
      </div>

      <div>
        <h4 class="footer-tieu-de">Cộng đồng</h4>
        <ul class="footer-danh-sach">
          <li><a href="chia-se.php">Chia sẻ công thức</a></li>
          <li><a href="tai-khoan.php">Đăng ký tài khoản</a></li>
          <li><a href="ca-nhan.php">Trang cá nhân</a></li>
          <li><a href="#">Bảng xếp hạng</a></li>
          <li><a href="#">Thử thách nấu ăn</a></li>
        </ul>
      </div>

      <div>
        <h4 class="footer-tieu-de">Thông tin</h4>
        <ul class="footer-danh-sach">
          <li><a href="#">Về BẾP VIỆT</a></li>
          <li><a href="#">Chính sách bảo mật</a></li>
          <li><a href="#">Điều khoản sử dụng</a></li>
          <li><a href="#">Liên hệ hợp tác</a></li>
          <li><a href="#">Hỗ trợ người dùng</a></li>
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

<!-- Nút cuộn lên -->
<button class="nut-cuon-len" id="nut-cuon-len" title="Lên đầu trang">↑</button>

<!-- Thông báo container -->
<div class="thong-bao-container" id="thong-bao-container"></div>

<script src="js/main.js"></script>
<script>
  // Hero search form handler
  const heroForm = document.getElementById('hero-tim-kiem');
  if (heroForm) {
    heroForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const val = document.getElementById('hero-o-tim-kiem').value.trim();
      window.location.href = 'kham-pha.php' + (val ? '?tim=' + encodeURIComponent(val) : '');
    });
  }
</script>
</body>
</html>
