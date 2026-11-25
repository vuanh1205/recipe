<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Khám Phá Món Ngon – BẾP VIỆT';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= escapeHtml($pageTitle) ?></title>
  <meta name="description" content="Khám phá hàng trăm công thức nấu ăn Việt Nam. Tìm kiếm và lọc theo vùng miền, danh mục, thời gian chế biến và độ khó." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    .kham-pha-chinh {
      padding: 2rem 0 4rem;
    }

    .ket-qua-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .ket-qua-dem {
      font-size: 0.9rem;
      color: var(--mau-chu-phu);
    }

    .ket-qua-dem strong {
      color: var(--mau-do-gach);
      font-weight: 700;
    }

    .hien-thi-chon {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .hien-thi-nut {
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1.5px solid var(--mau-vien);
      border-radius: var(--bo-nho);
      background: white;
      cursor: pointer;
      font-size: 1rem;
      transition: all var(--toc-do-nhanh);
    }

    .hien-thi-nut.hoat-dong,
    .hien-thi-nut:hover {
      border-color: var(--mau-do-gach);
      background: var(--mau-do-nhat);
      color: var(--mau-do-gach);
    }

    .phan-trang {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 3rem;
      flex-wrap: wrap;
    }

    .phan-trang-nut {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1.5px solid var(--mau-vien);
      border-radius: var(--bo-vua);
      background: white;
      cursor: pointer;
      font-size: 0.9rem;
      font-weight: 600;
      transition: all var(--toc-do-nhanh);
      color: var(--mau-chu-phu);
      font-family: inherit;
    }

    .phan-trang-nut:hover,
    .phan-trang-nut.hoat-dong {
      border-color: var(--mau-do-gach);
      background: var(--mau-do-gach);
      color: white;
    }

    .phan-trang-nut:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    .the-mon-an-mo-ta {
      font-size: 0.82rem;
      color: var(--mau-chu-phu);
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      margin-bottom: 8px;
      line-height: 1.5;
    }

    #khong-co-ket-qua {
      display: none;
      grid-column: 1 / -1;
    }

    .bo-loc-chip-nhom {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      padding: 0.75rem var(--khoang-lg);
      border-top: 1px solid var(--mau-vien);
      background: var(--mau-nen-xam);
    }

    .bo-loc-chip {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 5px 12px;
      background: white;
      border: 1.5px solid var(--mau-vien);
      border-radius: var(--bo-tron);
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      transition: all var(--toc-do-nhanh);
      font-family: inherit;
      color: var(--mau-chu-chinh);
    }

    .bo-loc-chip:hover,
    .bo-loc-chip.hoat-dong {
      border-color: var(--mau-do-gach);
      background: var(--mau-do-nhat);
      color: var(--mau-do-gach);
    }
  </style>
</head>
<body>

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

<!-- TIÊU ĐỀ TRANG -->
<div class="trang-tieu-de">
  <div class="trang-tieu-de-noi-dung container-sm">
    <h1>🍽️ Khám Phá Món Ngon Việt Nam</h1>
    <p>Tìm kiếm hàng trăm công thức nấu ăn từ ba miền Bắc – Trung – Nam</p>
  </div>
</div>

<!-- BỘ LỌC -->
<div class="bo-loc-khu-vuc" id="bo-loc-khu-vuc">
  <div class="container">
    <div class="bo-loc-noi-dung">
      <div class="bo-loc-tim-kiem">
        <span>🔍</span>
        <input type="text" id="o-tim-kiem" placeholder="Tìm kiếm theo tên món ăn..." autocomplete="off" />
      </div>

      <select class="bo-loc-select" id="loc-vung-mien">
        <option value="">Tất cả vùng miền</option>
        <option value="mien-bac">Miền Bắc</option>
        <option value="mien-trung">Miền Trung</option>
        <option value="mien-nam">Miền Nam</option>
      </select>

      <select class="bo-loc-select" id="loc-danh-muc">
        <option value="">Tất cả danh mục</option>
        <option value="gia-dinh">Món ăn gia đình</option>
        <option value="chay">Món ăn chay</option>
        <option value="trang-miem">Tráng miệng</option>
        <option value="khai-vi">Khai vị</option>
      </select>

      <select class="bo-loc-select" id="loc-thoi-gian">
        <option value="">Thời gian nấu</option>
        <option value="nhanh">Dưới 30 phút</option>
        <option value="vua">30 – 60 phút</option>
        <option value="lau">Hơn 1 tiếng</option>
      </select>

      <select class="bo-loc-select" id="loc-do-kho">
        <option value="">Độ khó</option>
        <option value="de">Dễ</option>
        <option value="trung-binh">Trung bình</option>
        <option value="kho">Khó</option>
      </select>

      <div class="bo-loc-sap-xep">
        <span>Sắp xếp:</span>
        <select class="bo-loc-select" id="sap-xep">
          <option value="moi-nhat">Mới nhất</option>
          <option value="pho-bien">Phổ biến nhất</option>
          <option value="danh-gia-cao">Đánh giá cao</option>
        </select>
      </div>
    </div>
  </div>

  <!-- Chip lọc nhanh -->
  <div class="bo-loc-chip-nhom">
    <span style="font-size:0.82rem;color:var(--mau-chu-phu);align-self:center;">Lọc nhanh:</span>
    <button class="bo-loc-chip" onclick="locNhanh('mien-bac', 'loc-vung-mien', this)">🏔️ Miền Bắc</button>
    <button class="bo-loc-chip" onclick="locNhanh('mien-trung', 'loc-vung-mien', this)">🌊 Miền Trung</button>
    <button class="bo-loc-chip" onclick="locNhanh('mien-nam', 'loc-vung-mien', this)">🌴 Miền Nam</button>
    <button class="bo-loc-chip" onclick="locNhanh('de', 'loc-do-kho', this)">⚡ Nấu nhanh</button>
    <button class="bo-loc-chip" onclick="locNhanh('chay', 'loc-danh-muc', this)">🥬 Món chay</button>
    <button class="bo-loc-chip" onclick="locNhanh('trang-miem', 'loc-danh-muc', this)">🍮 Tráng miệng</button>
  </div>
</div>

<!-- NỘI DUNG CHÍNH -->
<main class="kham-pha-chinh">
  <div class="container">
    <div class="ket-qua-header">
      <div class="ket-qua-dem">
        Tìm thấy <strong id="dem-ket-qua">18</strong> món ăn
      </div>
      <div class="hien-thi-chon">
        <span style="font-size:0.85rem;color:var(--mau-chu-phu);">Hiển thị:</span>
        <button class="hien-thi-nut hoat-dong" title="Lưới 3 cột" onclick="doiLuoi(3, this)">⊞</button>
        <button class="hien-thi-nut" title="Lưới 4 cột" onclick="doiLuoi(4, this)">⊟</button>
      </div>
    </div>

    <div class="luoi-mon-an" id="luoi-ket-qua">

      <!-- === MIỀN BẮC === -->
      <div class="the-mon-an hieu-ung-tai" data-ten="phở bò hà nội" data-mien="mien-bac" data-loai="gia-dinh" data-dokho="trung-binh" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/pho-bo.png" alt="Phở bò Hà Nội" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-do">Miền Bắc</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Hà Nội</div>
          <h3 class="the-mon-an-ten">Phở Bò Hà Nội</h3>
          <p class="the-mon-an-mo-ta">Món phở bò truyền thống Hà Nội với nước dùng trong vắt, ngọt tự nhiên từ xương bò.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 3 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="danh-gia-so">(248)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="bún chả hà nội" data-mien="mien-bac" data-loai="gia-dinh" data-dokho="de" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/bun-cha.png" alt="Bún chả Hà Nội" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-do">Miền Bắc</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Hà Nội</div>
          <h3 class="the-mon-an-ten">Bún Chả Hà Nội</h3>
          <p class="the-mon-an-mo-ta">Chả nướng thơm ngon chấm cùng nước dùng ngọt thanh, ăn kèm bún tươi và rau sống.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
            <span class="thong-tin-muc">🍽️ 2 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="danh-gia-so">(189)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="bún riêu cua" data-mien="mien-bac" data-loai="gia-dinh" data-dokho="trung-binh" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/mi-quang.png" alt="Bún riêu cua" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-do">Miền Bắc</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Hà Nội</div>
          <h3 class="the-mon-an-ten">Bún Riêu Cua</h3>
          <p class="the-mon-an-mo-ta">Bún nấu với gạch cua đồng, cà chua, đậu phụ và các loại rau thơm đặc trưng.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1.5 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span><span class="danh-gia-so">(112)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <!-- === MIỀN TRUNG === -->
      <div class="the-mon-an hieu-ung-tai" data-ten="bún bò huế" data-mien="mien-trung" data-loai="gia-dinh" data-dokho="kho" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/bun-bo-hue.png" alt="Bún bò Huế" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-vang">Miền Trung</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Thừa Thiên Huế</div>
          <h3 class="the-mon-an-ten">Bún Bò Huế</h3>
          <p class="the-mon-an-mo-ta">Bún bò cay nồng với sả, ruốc tôm, chân giò, huyết và các loại rau đặc trưng xứ Huế.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 2 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Khó</span>
            <span class="thong-tin-muc">🍽️ 6 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="danh-gia-so">(201)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="mì quảng" data-mien="mien-trung" data-loai="gia-dinh" data-dokho="trung-binh" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/mi-quang.png" alt="Mì Quảng" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-vang">Miền Trung</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Quảng Nam</div>
          <h3 class="the-mon-an-ten">Mì Quảng</h3>
          <p class="the-mon-an-mo-ta">Mì sợi dẹt màu vàng nghệ, chan ít nước nhân đậm đà cùng tôm, thịt và đậu phộng rang.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1.5 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="danh-gia-so">(134)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="cao lầu hội an" data-mien="mien-trung" data-loai="gia-dinh" data-dokho="kho" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/bun-bo-hue.png" alt="Cao lầu Hội An" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-vang">Miền Trung</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Hội An, Quảng Nam</div>
          <h3 class="the-mon-an-ten">Cao Lầu Hội An</h3>
          <p class="the-mon-an-mo-ta">Mì sợi dày đặc sắc với thịt xá xíu, tép rang, rau sống và bánh đa giòn.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 2 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Khó</span>
            <span class="thong-tin-muc">🍽️ 2 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span><span class="danh-gia-so">(87)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <!-- === MIỀN NAM === -->
      <div class="the-mon-an hieu-ung-tai" data-ten="bánh xèo miền tây" data-mien="mien-nam" data-loai="gia-dinh" data-dokho="trung-binh" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/banh-xeo.png" alt="Bánh xèo miền Tây" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1536304993881-ff86e5b2a7f4?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-xanh">Miền Nam</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Đồng bằng sông Cửu Long</div>
          <h3 class="the-mon-an-ten">Bánh Xèo Miền Tây</h3>
          <p class="the-mon-an-mo-ta">Bánh xèo giòn rụm nhân tôm thịt giá đỗ, cuộn rau sống chấm nước mắm chua ngọt.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 45 phút</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span><span class="danh-gia-so">(156)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="cá kho tộ" data-mien="mien-nam" data-loai="gia-dinh" data-dokho="de" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/bun-cha.png" alt="Cá kho tộ" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1563245372-f21724e3856d?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-xanh">Miền Nam</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Nam Bộ</div>
          <h3 class="the-mon-an-ten">Cá Kho Tộ</h3>
          <p class="the-mon-an-mo-ta">Cá trê hoặc cá lóc kho với nước dừa, nước màu, ớt và tiêu trong nồi đất truyền thống.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span><span class="danh-gia-so">(178)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="canh chua cá" data-mien="mien-nam" data-loai="gia-dinh" data-dokho="de" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/pho-bo.png" alt="Canh chua cá" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-xanh">Miền Nam</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Nam Bộ</div>
          <h3 class="the-mon-an-ten">Canh Chua Cá</h3>
          <p class="the-mon-an-mo-ta">Canh chua nấu với cá lóc, dứa, cà chua, giá đỗ và me tươi, hương vị chua ngọt thanh mát.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 30 phút</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="danh-gia-so">(145)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <!-- === MÓN CHAY === -->
      <div class="the-mon-an hieu-ung-tai" data-ten="bánh đậu xanh chay" data-mien="mien-nam" data-loai="chay" data-dokho="trung-binh" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/banh-xeo.png" alt="Chè đậu xanh" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1536304993881-ff86e5b2a7f4?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-xanh">Món Chay</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Toàn quốc</div>
          <h3 class="the-mon-an-ten">Chè Đậu Xanh Nước Dừa</h3>
          <p class="the-mon-an-mo-ta">Chè đậu xanh đánh mịn, chan nước cốt dừa béo ngậy, ăn nóng hoặc lạnh đều ngon.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 45 phút</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
            <span class="thong-tin-muc">🍽️ 6 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span><span class="danh-gia-so">(92)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="gỏi cuốn tôm thịt" data-mien="mien-nam" data-loai="khai-vi" data-dokho="de" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/bun-cha.png" alt="Gỏi cuốn" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-xanh">Miền Nam</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Nam Bộ</div>
          <h3 class="the-mon-an-ten">Gỏi Cuốn Tôm Thịt</h3>
          <p class="the-mon-an-mo-ta">Cuốn bánh tráng tươi với tôm, thịt luộc, bún, rau sống, chấm tương đậu phộng.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 30 phút</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="danh-gia-so">(167)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="nem rán chả giò" data-mien="mien-bac" data-loai="khai-vi" data-dokho="trung-binh" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/mi-quang.png" alt="Nem rán" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-do">Miền Bắc</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Hà Nội</div>
          <h3 class="the-mon-an-ten">Nem Rán (Chả Giò)</h3>
          <p class="the-mon-an-mo-ta">Nem rán giòn tan với nhân thịt, miến, mộc nhĩ, chấm nước mắm chua ngọt.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="danh-gia-so">(143)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <!-- Tráng miệng -->
      <div class="the-mon-an hieu-ung-tai" data-ten="chè ba màu" data-mien="mien-nam" data-loai="trang-miem" data-dokho="de" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/banh-xeo.png" alt="Chè ba màu" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1536304993881-ff86e5b2a7f4?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-vang">Tráng miệng</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Nam Bộ</div>
          <h3 class="the-mon-an-ten">Chè Ba Màu</h3>
          <p class="the-mon-an-mo-ta">Chè 3 lớp màu xanh đỏ trắng thơm ngon – đậu xanh, đậu đỏ, nước cốt dừa đá.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 30 phút</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
            <span class="thong-tin-muc">🍽️ 6 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span><span class="danh-gia-so">(98)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="thịt kho trứng" data-mien="mien-nam" data-loai="gia-dinh" data-dokho="de" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/pho-bo.png" alt="Thịt kho trứng" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-xanh">Miền Nam</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Nam Bộ</div>
          <h3 class="the-mon-an-ten">Thịt Kho Trứng Tàu</h3>
          <p class="the-mon-an-mo-ta">Thịt ba chỉ và trứng vịt kho nước dừa vàng óng, đậm đà – món ngon ngày Tết.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1.5 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
            <span class="thong-tin-muc">🍽️ 6 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="danh-gia-so">(234)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="bún đậu mắm tôm" data-mien="mien-bac" data-loai="gia-dinh" data-dokho="de" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/bun-cha.png" alt="Bún đậu mắm tôm" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-do">Miền Bắc</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Hà Nội</div>
          <h3 class="the-mon-an-ten">Bún Đậu Mắm Tôm</h3>
          <p class="the-mon-an-mo-ta">Bún tươi ăn kèm đậu phụ chiên vàng, chả cốm, dồi, chấm mắm tôm đặc trưng Hà Nội.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 30 phút</span>
            <span class="thong-tin-muc">👨‍🍳 Dễ</span>
            <span class="thong-tin-muc">🍽️ 2 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span><span class="danh-gia-so">(119)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="phở gà" data-mien="mien-bac" data-loai="gia-dinh" data-dokho="trung-binh" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/pho-bo.png" alt="Phở gà" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-do">Miền Bắc</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Hà Nội</div>
          <h3 class="the-mon-an-ten">Phở Gà</h3>
          <p class="the-mon-an-mo-ta">Phở gà với nước dùng ngọt thanh từ xương gà, thịt gà xé sợi mềm mịn và rau thơm tươi.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 2 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="danh-gia-so">(176)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="hủ tiếu nam vang" data-mien="mien-nam" data-loai="gia-dinh" data-dokho="trung-binh" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/mi-quang.png" alt="Hủ tiếu Nam Vang" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-xanh">Miền Nam</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Thành phố Hồ Chí Minh</div>
          <h3 class="the-mon-an-ten">Hủ Tiếu Nam Vang</h3>
          <p class="the-mon-an-mo-ta">Hủ tiếu khô hay nước với thịt heo, tôm, trứng cút, giá và hẹ, nước dùng trong vắt ngọt thanh.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 4 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span><span class="danh-gia-so">(108)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <div class="the-mon-an hieu-ung-tai" data-ten="bánh da lợn chay" data-mien="mien-nam" data-loai="trang-miem" data-dokho="trung-binh" onclick="window.location.href='cong-thuc.php'">
        <div class="the-mon-an-anh">
          <img src="images/banh-xeo.png" alt="Bánh da lợn" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1536304993881-ff86e5b2a7f4?w=400&q=80'" />
          <div class="the-mon-an-nhan"><span class="huy-hieu huy-hieu-vang">Tráng miệng</span></div>
          <button class="the-mon-an-yeu-thich">🤍</button>
        </div>
        <div class="the-mon-an-noi-dung">
          <div class="the-mon-an-xuat-xu">📍 Nam Bộ</div>
          <h3 class="the-mon-an-ten">Bánh Da Lợn</h3>
          <p class="the-mon-an-mo-ta">Bánh nhiều lớp làm từ bột năng, nước cốt dừa và đậu xanh, dai mềm màu sắc bắt mắt.</p>
          <div class="the-mon-an-thong-tin">
            <span class="thong-tin-muc">⏱️ 1 giờ</span>
            <span class="thong-tin-muc">👨‍🍳 Trung bình</span>
            <span class="thong-tin-muc">🍽️ 8 người</span>
          </div>
          <div class="the-mon-an-chan">
            <div class="danh-gia-sao"><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao">⭐</span><span class="sao sao-trong">☆</span><span class="danh-gia-so">(76)</span></div>
            <a href="cong-thuc.php" class="nut nut-chinh nut-nho">Xem công thức</a>
          </div>
        </div>
      </div>

      <!-- Không có kết quả -->
      <div id="khong-co-ket-qua" class="khong-co-ket-qua">
        <div class="khong-co-ket-qua-bieu-tuong">🔍</div>
        <h3>Không tìm thấy món ăn phù hợp</h3>
        <p>Thử thay đổi từ khóa tìm kiếm hoặc điều chỉnh bộ lọc</p>
        <button onclick="xoaBoLoc()" class="nut nut-thu-cap" style="margin-top:1rem;">Xóa bộ lọc</button>
      </div>
    </div>

    <!-- PHÂN TRANG -->
    <div class="phan-trang" id="phan-trang">
      <button class="phan-trang-nut" disabled>‹</button>
      <button class="phan-trang-nut hoat-dong">1</button>
      <button class="phan-trang-nut">2</button>
      <button class="phan-trang-nut">3</button>
      <button class="phan-trang-nut">...</button>
      <button class="phan-trang-nut">12</button>
      <button class="phan-trang-nut">›</button>
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
          <li><a href="kham-pha.php?loai=chay">Món ăn chay</a></li>
        </ul>
      </div>
      <div>
        <h4 class="footer-tieu-de">Cộng đồng</h4>
        <ul class="footer-danh-sach">
          <li><a href="chia-se.php">Chia sẻ công thức</a></li>
          <li><a href="tai-khoan.php">Đăng ký tài khoản</a></li>
          <li><a href="ca-nhan.php">Trang cá nhân</a></li>
        </ul>
      </div>
      <div>
        <h4 class="footer-tieu-de">Hỗ trợ</h4>
        <ul class="footer-danh-sach">
          <li><a href="#">Về BẾP VIỆT</a></li>
          <li><a href="#">Liên hệ</a></li>
          <li><a href="#">Điều khoản</a></li>
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
  function locNhanh(gia_tri, id_select, chip) {
    const sel = document.getElementById(id_select);
    if (!sel) return;
    
    // Toggle
    if (sel.value === gia_tri) {
      sel.value = '';
      chip.classList.remove('hoat-dong');
    } else {
      sel.value = gia_tri;
      // Bỏ hoạt động tất cả chip cùng nhóm
      document.querySelectorAll('.bo-loc-chip').forEach(c => {
        if (c !== chip) c.classList.remove('hoat-dong');
      });
      chip.classList.add('hoat-dong');
    }
    window.BepViet.locMonAn();
  }

  function xoaBoLoc() {
    document.getElementById('o-tim-kiem').value = '';
    document.getElementById('loc-vung-mien').value = '';
    document.getElementById('loc-danh-muc').value = '';
    document.getElementById('loc-do-kho').value = '';
    document.querySelectorAll('.bo-loc-chip').forEach(c => c.classList.remove('hoat-dong'));
    window.BepViet.locMonAn();
  }

  function doiLuoi(soCot, nut) {
    const luoi = document.getElementById('luoi-ket-qua');
    if (!luoi) return;
    document.querySelectorAll('.hien-thi-nut').forEach(n => n.classList.remove('hoat-dong'));
    nut.classList.add('hoat-dong');
    luoi.className = 'luoi-mon-an' + (soCot === 4 ? ' luoi-mon-an-4' : '');
  }

  // Phân trang
  document.querySelectorAll('.phan-trang-nut').forEach(nut => {
    nut.addEventListener('click', function() {
      if (this.disabled || this.textContent === '...') return;
      document.querySelectorAll('.phan-trang-nut').forEach(n => n.classList.remove('hoat-dong'));
      if (this.textContent !== '‹' && this.textContent !== '›') {
        this.classList.add('hoat-dong');
      }
    });
  });
</script>
</body>
</html>
