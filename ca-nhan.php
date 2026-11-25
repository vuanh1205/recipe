<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Trang Cá Nhân – BẾP VIỆT';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= escapeHtml($pageTitle) ?></title>
  <meta name="description" content="Quản lý trang cá nhân, công thức đã chia sẻ và món ăn yêu thích trên BẾP VIỆT." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    .ca-nhan-trang { padding-top: 70px; }

    /* Banner */
    .ca-nhan-banner {
      background: linear-gradient(135deg, var(--mau-do-gach) 0%, #7B1A13 100%);
      position: relative; overflow: hidden; padding: 3rem 0 0;
    }
    .ca-nhan-banner::before {
      content: '';
      position: absolute; inset: 0;
      background: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.05) 0%, transparent 60%),
                  radial-gradient(circle at 80% 20%, rgba(255,255,255,0.03) 0%, transparent 50%);
    }
    .ca-nhan-banner-noi {
      max-width: var(--rong-noi-dung);
      margin: 0 auto; padding: 0 var(--khoang-lg);
      position: relative;
    }
    .ca-nhan-ho-so {
      display: flex; align-items: flex-end;
      gap: 2rem; flex-wrap: wrap;
    }
    .anh-dai-dien-vong {
      width: 120px; height: 120px; border-radius: 50%;
      border: 4px solid rgba(255,255,255,0.3); overflow: hidden;
      background: linear-gradient(135deg, var(--mau-vang-cam), var(--mau-do-gach-dam));
      display: flex; align-items: center; justify-content: center;
      font-size: 3rem; font-weight: 800; color: white;
      position: relative; flex-shrink: 0;
    }
    .ca-nhan-thong-tin { flex: 1; min-width: 220px; padding-bottom: 1.5rem; }
    .ca-nhan-ten { font-size: 1.8rem; font-weight: 800; color: white; margin-bottom: 4px; }
    .ca-nhan-email { font-size: 0.9rem; color: rgba(255,255,255,0.7); margin-bottom: 10px; }
    .ca-nhan-gioi-thieu { font-size: 0.95rem; color: rgba(255,255,255,0.85); max-width: 500px; line-height: 1.6; }
    .ca-nhan-thong-ke { display: flex; gap: 2rem; margin-top: 1.2rem; flex-wrap: wrap; }
    .thong-ke-so { font-size: 1.6rem; font-weight: 800; color: white; display: block; }
    .thong-ke-nhan { font-size: 0.75rem; color: rgba(255,255,255,0.65); letter-spacing: 0.5px; }
    .ca-nhan-hanh-dong { display: flex; align-items: flex-end; gap: 10px; padding-bottom: 1.5rem; flex-shrink: 0; }
    .nut-chinh-sua-banner {
      display: flex; align-items: center; gap: 8px;
      padding: 10px 20px; border: 2px solid rgba(255,255,255,0.4);
      border-radius: var(--bo-tron); background: rgba(255,255,255,0.1);
      color: white; font-family: 'Be Vietnam Pro', sans-serif;
      font-size: 0.9rem; font-weight: 600; cursor: pointer;
      transition: all var(--toc-do-nhanh);
    }
    .nut-chinh-sua-banner:hover { background: rgba(255,255,255,0.25); }
    .nut-chia-se-banner {
      display: flex; align-items: center; gap: 8px;
      padding: 10px 20px; border-radius: var(--bo-tron);
      background: white; color: var(--mau-do-gach);
      font-family: 'Be Vietnam Pro', sans-serif; font-size: 0.9rem;
      font-weight: 700; cursor: pointer; border: none;
      transition: all var(--toc-do-nhanh);
    }
    .nut-chia-se-banner:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0,0,0,0.2); }

    /* Tabs */
    .ca-nhan-tab-thanh {
      background: white; border-bottom: 1px solid var(--mau-vien-nhat);
      position: sticky; top: 70px; z-index: 90;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .ca-nhan-tab-noi {
      max-width: var(--rong-noi-dung); margin: 0 auto;
      padding: 0 var(--khoang-lg); display: flex; overflow-x: auto;
    }
    .ca-nhan-tab {
      display: flex; align-items: center; gap: 8px;
      padding: 1rem 1.4rem; border: none; background: none;
      font-family: 'Be Vietnam Pro', sans-serif; font-size: 0.9rem;
      font-weight: 600; color: var(--mau-chu-phu); cursor: pointer;
      border-bottom: 3px solid transparent; white-space: nowrap;
      transition: all var(--toc-do-nhanh);
    }
    .ca-nhan-tab:hover { color: var(--mau-do-gach); }
    .ca-nhan-tab.hoat-dong { color: var(--mau-do-gach); border-bottom-color: var(--mau-do-gach); }
    .tab-dem {
      background: var(--mau-do-nhat); color: var(--mau-do-gach);
      font-size: 0.72rem; font-weight: 700;
      padding: 2px 7px; border-radius: var(--bo-tron);
    }

    /* Nội dung chính */
    .ca-nhan-chinh {
      max-width: var(--rong-noi-dung); margin: 0 auto;
      padding: 2.5rem var(--khoang-lg) 4rem;
    }
    .ca-nhan-noi-dung-tab { display: none; }
    .ca-nhan-noi-dung-tab.hoat-dong { display: block; }

    /* Lưới công thức */
    .cong-thuc-luoi {
      display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;
    }
    @media (max-width: 1024px) { .cong-thuc-luoi { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 600px) { .cong-thuc-luoi { grid-template-columns: 1fr; } }

    .cong-thuc-the {
      background: white; border-radius: var(--bo-lon); overflow: hidden;
      box-shadow: var(--bong-nhe); border: 1px solid var(--mau-vien-nhat);
      transition: all var(--toc-do); position: relative;
    }
    .cong-thuc-the:hover { transform: translateY(-4px); box-shadow: var(--bong-vua); }
    .cong-thuc-the-anh { height: 180px; overflow: hidden; position: relative; }
    .cong-thuc-the-anh img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--toc-do-cham); }
    .cong-thuc-the:hover .cong-thuc-the-anh img { transform: scale(1.05); }
    .cong-thuc-trang-thai {
      position: absolute; top: 10px; left: 10px;
      padding: 4px 10px; border-radius: var(--bo-tron);
      font-size: 0.72rem; font-weight: 700;
    }
    .trang-thai-duyet { background: rgba(45,106,79,0.9); color: white; }
    .trang-thai-cho { background: rgba(232,137,58,0.9); color: white; }
    .trang-thai-nhap { background: rgba(90,90,90,0.9); color: white; }
    .cong-thuc-the-hanh-dong {
      position: absolute; top: 10px; right: 10px;
      display: flex; gap: 6px; opacity: 0;
      transition: opacity var(--toc-do-nhanh);
    }
    .cong-thuc-the:hover .cong-thuc-the-hanh-dong { opacity: 1; }
    .the-nut-nho {
      width: 32px; height: 32px; border-radius: 50%;
      background: white; border: none; cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.85rem; box-shadow: 0 2px 8px rgba(0,0,0,0.15);
      transition: all var(--toc-do-nhanh);
    }
    .the-nut-nho:hover { transform: scale(1.1); }
    .the-nut-nho.xoa:hover { background: #FDECEA; }
    .cong-thuc-the-noi { padding: 1rem; }
    .the-danh-muc-nhan {
      display: inline-block; padding: 3px 10px;
      background: var(--mau-do-nhat); color: var(--mau-do-gach);
      border-radius: var(--bo-tron); font-size: 0.72rem;
      font-weight: 600; margin-bottom: 8px;
    }
    .the-ten { font-size: 1rem; font-weight: 700; color: var(--mau-chu-chinh); margin-bottom: 6px; line-height: 1.4; }
    .the-meta { display: flex; gap: 10px; font-size: 0.78rem; color: var(--mau-chu-mo); margin-bottom: 10px; flex-wrap: wrap; }
    .the-sao-luot { display: flex; align-items: center; justify-content: space-between; padding-top: 10px; border-top: 1px solid var(--mau-vien-nhat); }
    .the-sao-nho { display: flex; gap: 2px; font-size: 0.75rem; align-items: center; }
    .sao-vang { color: var(--mau-vang-sao); }
    .the-luot-xem { font-size: 0.75rem; color: var(--mau-chu-mo); display: flex; align-items: center; gap: 4px; }

    /* Toolbar tab */
    .tab-cong-cu {
      display: flex; align-items: center; justify-content: space-between;
      margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;
    }
    .tab-tieu-de { font-size: 1.2rem; font-weight: 700; }
    .tab-loc-nhom { display: flex; gap: 8px; flex-wrap: wrap; }
    .loc-nut {
      padding: 6px 14px; border: 1.5px solid var(--mau-vien);
      border-radius: var(--bo-tron); background: white;
      font-family: 'Be Vietnam Pro', sans-serif; font-size: 0.82rem;
      font-weight: 600; color: var(--mau-chu-phu); cursor: pointer;
      transition: all var(--toc-do-nhanh);
    }
    .loc-nut:hover, .loc-nut.hoat-dong {
      border-color: var(--mau-do-gach); background: var(--mau-do-nhat);
      color: var(--mau-do-gach);
    }
    .nut-them-moi {
      display: flex; align-items: center; gap: 8px;
      padding: 10px 20px; background: var(--mau-do-gach);
      color: white; border: none; border-radius: var(--bo-tron);
      font-family: 'Be Vietnam Pro', sans-serif; font-size: 0.9rem;
      font-weight: 700; cursor: pointer; transition: all var(--toc-do-nhanh);
      text-decoration: none;
    }
    .nut-them-moi:hover { background: var(--mau-do-gach-dam); transform: translateY(-2px); box-shadow: var(--bong-do); }

    /* Yêu thích */
    .yeu-thich-luoi {
      display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;
    }
    @media (max-width: 1024px) { .yeu-thich-luoi { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 600px) { .yeu-thich-luoi { grid-template-columns: 1fr; } }
    .yeu-thich-the {
      background: white; border-radius: var(--bo-lon); overflow: hidden;
      box-shadow: var(--bong-nhe); border: 1px solid var(--mau-vien-nhat);
      transition: all var(--toc-do); position: relative;
    }
    .yeu-thich-the:hover { transform: translateY(-4px); box-shadow: var(--bong-vua); }
    .nut-bo-yeu-thich {
      position: absolute; top: 10px; right: 10px;
      width: 36px; height: 36px; border-radius: 50%;
      background: white; border: none; cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      font-size: 1rem; box-shadow: 0 2px 10px rgba(0,0,0,0.15);
      transition: all var(--toc-do-nhanh); z-index: 2;
    }
    .nut-bo-yeu-thich:hover { transform: scale(1.1); background: #FDECEA; }
    .yeu-thich-the-anh { height: 180px; overflow: hidden; }
    .yeu-thich-the-anh img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--toc-do-cham); }
    .yeu-thich-the:hover .yeu-thich-the-anh img { transform: scale(1.05); }
    .yeu-thich-the-noi { padding: 1rem; }
    .nut-xem-ct { font-size: 0.78rem; font-weight: 700; color: var(--mau-do-gach); text-decoration: none; }
    .nut-xem-ct:hover { opacity: 0.7; }

    /* Form chỉnh sửa */
    .chinh-sua-layout {
      display: grid; grid-template-columns: 1fr 320px; gap: 2rem; align-items: start;
    }
    @media (max-width: 768px) { .chinh-sua-layout { grid-template-columns: 1fr; } }
    .chinh-sua-the {
      background: white; border-radius: var(--bo-lon);
      padding: var(--khoang-lg); box-shadow: var(--bong-nhe);
      border: 1px solid var(--mau-vien-nhat); margin-bottom: 1.5rem;
    }
    .chinh-sua-tieu-de {
      font-size: 1.1rem; font-weight: 700; color: var(--mau-chu-chinh);
      margin-bottom: var(--khoang-md); padding-bottom: var(--khoang-md);
      border-bottom: 2px solid var(--mau-vien-nhat); display: flex; align-items: center; gap: 8px;
    }
    .form-nhom { margin-bottom: 1.2rem; }
    .form-nhan { display: block; font-size: 0.85rem; font-weight: 600; color: var(--mau-chu-phu); margin-bottom: 6px; }
    .form-dau-vao {
      width: 100%; padding: 10px 14px; border: 1.5px solid var(--mau-vien);
      border-radius: var(--bo-vua); font-family: 'Be Vietnam Pro', sans-serif;
      font-size: 0.9rem; color: var(--mau-chu-chinh); background: var(--mau-nen);
      transition: all var(--toc-do-nhanh); outline: none;
    }
    .form-dau-vao:focus { border-color: var(--mau-do-gach); background: white; box-shadow: 0 0 0 3px rgba(192,57,43,0.1); }
    textarea.form-dau-vao { resize: vertical; min-height: 100px; }
    .form-hang-doi { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    @media (max-width: 600px) { .form-hang-doi { grid-template-columns: 1fr; } }
    .nut-luu {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 11px 26px; background: linear-gradient(135deg, var(--mau-do-gach), var(--mau-do-gach-dam));
      color: white; border: none; border-radius: var(--bo-tron);
      font-family: 'Be Vietnam Pro', sans-serif; font-size: 0.95rem;
      font-weight: 700; cursor: pointer; transition: all var(--toc-do-nhanh); margin-top: 8px;
    }
    .nut-luu:hover { transform: translateY(-2px); box-shadow: var(--bong-do); }
    .nut-huy {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 11px 20px; background: white; color: var(--mau-chu-phu);
      border: 1.5px solid var(--mau-vien); border-radius: var(--bo-tron);
      font-family: 'Be Vietnam Pro', sans-serif; font-size: 0.95rem;
      font-weight: 600; cursor: pointer; transition: all var(--toc-do-nhanh); margin-top: 8px; margin-left: 10px;
    }
    .nut-huy:hover { border-color: var(--mau-chu-phu); background: var(--mau-nen); }

    /* Cột phải cài đặt */
    .cot-phai-the {
      background: white; border-radius: var(--bo-lon);
      padding: var(--khoang-lg); box-shadow: var(--bong-nhe);
      border: 1px solid var(--mau-vien-nhat); margin-bottom: 1.5rem;
    }
    .cot-phai-tieu-de { font-size: 1rem; font-weight: 700; margin-bottom: var(--khoang-md); display: flex; align-items: center; gap: 8px; }
    .anh-chinh-sua-noi { display: flex; flex-direction: column; align-items: center; gap: 1rem; }
    .anh-lon {
      width: 110px; height: 110px; border-radius: 50%;
      background: linear-gradient(135deg, var(--mau-vang-cam), var(--mau-do-gach-dam));
      display: flex; align-items: center; justify-content: center;
      font-size: 2.5rem; font-weight: 800; color: white; position: relative;
    }
    .anh-tai-len {
      position: absolute; bottom: 2px; right: 2px; width: 30px; height: 30px;
      border-radius: 50%; background: var(--mau-do-gach); color: white;
      display: flex; align-items: center; justify-content: center; font-size: 0.8rem;
      cursor: pointer; border: 2px solid white; transition: all var(--toc-do-nhanh);
    }
    .anh-tai-len:hover { background: var(--mau-do-gach-dam); }
    .nut-tai-len-anh {
      display: flex; align-items: center; gap: 8px; padding: 10px 20px;
      border: 1.5px dashed var(--mau-do-gach); border-radius: var(--bo-vua);
      color: var(--mau-do-gach); background: var(--mau-do-nhat);
      font-family: 'Be Vietnam Pro', sans-serif; font-size: 0.85rem;
      font-weight: 600; cursor: pointer; transition: all var(--toc-do-nhanh);
    }
    .nut-tai-len-anh:hover { background: rgba(192,57,43,0.1); }
    .anh-ghi-chu { font-size: 0.75rem; color: var(--mau-chu-mo); text-align: center; line-height: 1.6; }

    /* Huy hiệu */
    .huy-hieu-luoi { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
    .huy-hieu-muc {
      display: flex; flex-direction: column; align-items: center; gap: 6px;
      padding: 10px; border-radius: var(--bo-vua); border: 1.5px solid var(--mau-vien-nhat);
      text-align: center; transition: all var(--toc-do-nhanh);
    }
    .huy-hieu-muc:hover { border-color: var(--mau-vang-sao); background: #FFFBF0; }
    .huy-hieu-bieu-tuong { font-size: 1.8rem; }
    .huy-hieu-ten { font-size: 0.7rem; font-weight: 600; color: var(--mau-chu-phu); line-height: 1.3; }

    /* Thống kê hoạt động */
    .thong-ke-luoi { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 2rem; }
    @media (max-width: 768px) { .thong-ke-luoi { grid-template-columns: repeat(2, 1fr); } }
    .thong-ke-the {
      background: white; border-radius: var(--bo-lon); padding: 1.5rem;
      text-align: center; box-shadow: var(--bong-nhe); border: 1px solid var(--mau-vien-nhat);
    }
    .thong-ke-icon { font-size: 2rem; margin-bottom: 4px; }
    .thong-ke-so-lon { font-size: 1.5rem; font-weight: 800; color: var(--mau-do-gach); }
    .thong-ke-nhan-the { font-size: 0.8rem; color: var(--mau-chu-phu); }

    /* Thông báo toast */
    .thong-bao-container {
      position: fixed; top: 90px; right: 20px; z-index: 9999;
      display: flex; flex-direction: column; gap: 10px; pointer-events: none;
    }
    .thong-bao-muc {
      display: flex; align-items: center; gap: 12px;
      padding: 14px 20px; border-radius: var(--bo-vua); background: white;
      box-shadow: var(--bong-vua); border-left: 4px solid;
      max-width: 350px; pointer-events: all;
      animation: truot-vao 0.3s ease;
    }
    @keyframes truot-vao {
      from { transform: translateX(100px); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }
    .thong-bao-muc.thanh-cong { border-left-color: var(--mau-xanh-la); }
    .thong-bao-muc.canh-bao { border-left-color: var(--mau-vang-cam); }
    .thong-bao-muc.loi { border-left-color: var(--mau-do-gach); }
    .thong-bao-bieu-tuong { font-size: 1.3rem; }
    .thong-bao-noi-dung { flex: 1; }
    .thong-bao-tieu-de { font-size: 0.85rem; font-weight: 700; color: var(--mau-chu-chinh); }
    .thong-bao-chi-tiet { font-size: 0.78rem; color: var(--mau-chu-phu); }

    /* Modal xóa */
    .modal-phu {
      position: fixed; inset: 0; z-index: 10000;
      display: none; align-items: center; justify-content: center;
      background: rgba(0,0,0,0.5); backdrop-filter: blur(4px);
    }
    .modal-phu.hien { display: flex; }
    .modal-the {
      background: white; border-radius: var(--bo-lon);
      padding: 2rem; max-width: 420px; width: 90%;
      box-shadow: var(--bong-dam); text-align: center;
      animation: zoom-vao 0.3s ease;
    }
    @keyframes zoom-vao {
      from { transform: scale(0.9); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }
    .modal-bieu-tuong { font-size: 3rem; margin-bottom: 1rem; }
    .modal-tieu-de { font-size: 1.2rem; font-weight: 700; margin-bottom: 10px; }
    .modal-mo-ta { font-size: 0.9rem; color: var(--mau-chu-phu); margin-bottom: 1.5rem; line-height: 1.6; }
    .modal-nut-nhom { display: flex; gap: 10px; justify-content: center; }
    .nut-xac-nhan-xoa {
      padding: 10px 24px; background: var(--mau-do-gach);
      color: white; border: none; border-radius: var(--bo-tron);
      font-family: 'Be Vietnam Pro', sans-serif; font-size: 0.9rem;
      font-weight: 700; cursor: pointer; transition: all var(--toc-do-nhanh);
    }
    .nut-xac-nhan-xoa:hover { background: var(--mau-do-gach-dam); }
    .nut-huy-xoa {
      padding: 10px 24px; background: white; color: var(--mau-chu-phu);
      border: 1.5px solid var(--mau-vien); border-radius: var(--bo-tron);
      font-family: 'Be Vietnam Pro', sans-serif; font-size: 0.9rem;
      font-weight: 600; cursor: pointer; transition: all var(--toc-do-nhanh);
    }
    .nut-huy-xoa:hover { border-color: var(--mau-chu-phu); }

    /* Responsive */
    @media (max-width: 768px) {
      .ca-nhan-ho-so { flex-direction: column; align-items: flex-start; }
      .ca-nhan-hanh-dong { width: 100%; padding-bottom: 1.5rem; }
      .ca-nhan-ten { font-size: 1.5rem; }
    }
  </style>
</head>
<body>
  <!-- Thông báo toast -->
  <div class="thong-bao-container" id="thong-bao-container"></div>

  <!-- Modal xác nhận xóa -->
  <div class="modal-phu" id="modal-xoa">
    <div class="modal-the">
      <div class="modal-bieu-tuong">🗑️</div>
      <div class="modal-tieu-de">Xóa công thức?</div>
      <p class="modal-mo-ta" id="modal-mo-ta">Bạn có chắc muốn xóa công thức này không?</p>
      <div class="modal-nut-nhom">
        <button class="nut-huy-xoa" id="nut-huy-xoa">Giữ lại</button>
        <button class="nut-xac-nhan-xoa" id="nut-xac-nhan-xoa">Xóa công thức</button>
      </div>
    </div>
  </div>

  <!-- Thanh điều hướng -->
  <nav class="thanh-dieu-huong" id="thanh-nav">
    <div class="nav-noi">
      <a href="index.php" class="nav-logo">
        <div class="logo-bieu-tuong">🍜</div>
        <div class="logo-chu">
          <span class="logo-ten-chinh">BẾP VIỆT</span>
          <span class="logo-slogan">Hương vị quê nhà</span>
        </div>
      </a>
      <ul class="nav-menu" id="nav-menu">
        <li><a href="index.php" class="nav-lien-ket">Trang chủ</a></li>
        <li><a href="kham-pha.php" class="nav-lien-ket">Khám phá món ngon</a></li>
        <li>
          <a href="#" class="nav-lien-ket nav-co-menu-con">Ẩm thực ba miền ▾</a>
          <div class="nav-menu-con">
            <a href="kham-pha.php?mien=bac" class="nav-menu-con-muc">🏔️ Miền Bắc</a>
            <a href="kham-pha.php?mien=trung" class="nav-menu-con-muc">🌊 Miền Trung</a>
            <a href="kham-pha.php?mien=nam" class="nav-menu-con-muc">🌴 Miền Nam</a>
          </div>
        </li>
        <li><a href="chia-se.php" class="nav-lien-ket">Chia sẻ công thức</a></li>
        <li><a href="index.php#gioi-thieu" class="nav-lien-ket">Giới thiệu</a></li>
      </ul>
      <div class="nav-tai-khoan">
        <div class="tai-khoan-dropdown" id="tai-khoan-dropdown" style="display:flex; cursor:pointer; align-items:center; gap:8px;" onclick="toggleDropdown()">
          <div style="width:36px; height:36px; border-radius:50%; background:var(--mau-do-gach); color:white; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:0.9rem;">N</div>
          <span style="font-size:0.85rem; font-weight:600; color:var(--mau-chu-chinh);">Nguyễn Hương</span>
          <div class="tai-khoan-dropdown-menu" id="dropdown-menu">
            <a href="ca-nhan.php" class="dropdown-muc hoat-dong">👤 Trang cá nhân</a>
            <a href="chia-se.php" class="dropdown-muc">➕ Thêm công thức</a>
            <div class="dropdown-phan-cach"></div>
            <button class="dropdown-muc xuat-ky" onclick="dangXuat()">🚪 Đăng xuất</button>
          </div>
        </div>
      </div>
      <button class="nav-menu-toggle" id="nav-toggle" aria-label="Mở menu">☰</button>
    </div>
  </nav>

  <!-- Trang chính -->
  <main class="ca-nhan-trang">

    <!-- Banner cá nhân -->
    <div class="ca-nhan-banner">
      <div class="ca-nhan-banner-noi">
        <div class="ca-nhan-ho-so">
          <div class="anh-dai-dien-vong">N</div>

          <div class="ca-nhan-thong-tin">
            <h1 class="ca-nhan-ten" id="hien-thi-ten">Nguyễn Minh Hương</h1>
            <div class="ca-nhan-email">nguyen.minhhương@gmail.com</div>
            <div class="ca-nhan-gioi-thieu">
              Đam mê nấu ăn từ nhỏ, yêu thích những món ăn truyền thống Việt Nam. Tôi tin rằng mỗi món ăn đều mang một câu chuyện văn hóa đẹp đẽ cần được lưu giữ và truyền lại.
            </div>
            <div class="ca-nhan-thong-ke">
              <div class="thong-ke-muc">
                <span class="thong-ke-so">12</span>
                <span class="thong-ke-nhan">Công thức</span>
              </div>
              <div class="thong-ke-muc">
                <span class="thong-ke-so" id="hien-thi-yt">28</span>
                <span class="thong-ke-nhan">Yêu thích</span>
              </div>
              <div class="thong-ke-muc">
                <span class="thong-ke-so">143</span>
                <span class="thong-ke-nhan">Bình luận</span>
              </div>
              <div class="thong-ke-muc">
                <span class="thong-ke-so">5.2K</span>
                <span class="thong-ke-nhan">Lượt xem</span>
              </div>
            </div>
          </div>

          <div class="ca-nhan-hanh-dong">
            <button class="nut-chinh-sua-banner" onclick="chuyenTab('chinh-sua')">✏️ Chỉnh sửa hồ sơ</button>
            <button class="nut-chia-se-banner" onclick="chiaSeTrang()">🔗 Chia sẻ trang</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tab điều hướng -->
    <div class="ca-nhan-tab-thanh">
      <div class="ca-nhan-tab-noi">
        <button class="ca-nhan-tab hoat-dong" data-tab="cong-thuc" onclick="chuyenTab('cong-thuc')">
          📋 Công thức đã đăng <span class="tab-dem">12</span>
        </button>
        <button class="ca-nhan-tab" data-tab="yeu-thich" onclick="chuyenTab('yeu-thich')">
          ❤️ Món yêu thích <span class="tab-dem" id="tab-dem-yt">28</span>
        </button>
        <button class="ca-nhan-tab" data-tab="hoat-dong" onclick="chuyenTab('hoat-dong')">
          📊 Hoạt động
        </button>
        <button class="ca-nhan-tab" data-tab="chinh-sua" onclick="chuyenTab('chinh-sua')">
          ⚙️ Cài đặt
        </button>
      </div>
    </div>

    <!-- Nội dung chính -->
    <div class="ca-nhan-chinh">

      <!-- Tab: Công thức đã đăng -->
      <div class="ca-nhan-noi-dung-tab hoat-dong" id="tab-cong-thuc">
        <div class="tab-cong-cu">
          <h2 class="tab-tieu-de">Công thức của tôi</h2>
          <div style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
            <div class="tab-loc-nhom">
              <button class="loc-nut hoat-dong" onclick="locCongThuc(this, 'tat-ca')">Tất cả</button>
              <button class="loc-nut" onclick="locCongThuc(this, 'da-duyet')">Đã duyệt</button>
              <button class="loc-nut" onclick="locCongThuc(this, 'cho-duyet')">Chờ duyệt</button>
              <button class="loc-nut" onclick="locCongThuc(this, 'nhap')">Nháp</button>
            </div>
            <a href="chia-se.php" class="nut-them-moi">➕ Thêm công thức</a>
          </div>
        </div>

        <div class="cong-thuc-luoi" id="luoi-cong-thuc">

          <div class="cong-thuc-the" data-trang-thai="da-duyet">
            <div class="cong-thuc-the-anh">
              <img src="images/pho-bo.png" alt="Phở bò Hà Nội" loading="lazy" />
              <span class="cong-thuc-trang-thai trang-thai-duyet">✓ Đã duyệt</span>
              <div class="cong-thuc-the-hanh-dong">
                <button class="the-nut-nho" title="Chỉnh sửa" onclick="chinhSuaCongThuc('pho-bo')">✏️</button>
                <button class="the-nut-nho xoa" title="Xóa" onclick="xacNhanXoa('pho-bo', 'Phở bò Hà Nội')">🗑️</button>
              </div>
            </div>
            <div class="cong-thuc-the-noi">
              <span class="the-danh-muc-nhan">Miền Bắc</span>
              <div class="the-ten">Phở bò Hà Nội truyền thống</div>
              <div class="the-meta">
                <span>⏱️ 3 giờ</span><span>👥 4 người</span><span>🔥 Trung bình</span>
              </div>
              <div class="the-sao-luot">
                <div class="the-sao-nho">
                  <span class="sao-vang">★★★★★</span>
                  <span style="font-size:0.75rem; color:var(--mau-chu-mo); margin-left:4px;">(47)</span>
                </div>
                <div class="the-luot-xem">👁️ 1.2K</div>
              </div>
            </div>
          </div>

          <div class="cong-thuc-the" data-trang-thai="da-duyet">
            <div class="cong-thuc-the-anh">
              <img src="images/bun-cha.png" alt="Bún chả Hà Nội" loading="lazy" />
              <span class="cong-thuc-trang-thai trang-thai-duyet">✓ Đã duyệt</span>
              <div class="cong-thuc-the-hanh-dong">
                <button class="the-nut-nho" title="Chỉnh sửa" onclick="chinhSuaCongThuc('bun-cha')">✏️</button>
                <button class="the-nut-nho xoa" title="Xóa" onclick="xacNhanXoa('bun-cha', 'Bún chả Hà Nội')">🗑️</button>
              </div>
            </div>
            <div class="cong-thuc-the-noi">
              <span class="the-danh-muc-nhan">Miền Bắc</span>
              <div class="the-ten">Bún chả Hà Nội đúng vị</div>
              <div class="the-meta">
                <span>⏱️ 1 giờ</span><span>👥 3 người</span><span>🔥 Dễ</span>
              </div>
              <div class="the-sao-luot">
                <div class="the-sao-nho">
                  <span class="sao-vang">★★★★☆</span>
                  <span style="font-size:0.75rem; color:var(--mau-chu-mo); margin-left:4px;">(32)</span>
                </div>
                <div class="the-luot-xem">👁️ 893</div>
              </div>
            </div>
          </div>

          <div class="cong-thuc-the" data-trang-thai="da-duyet">
            <div class="cong-thuc-the-anh">
              <img src="images/banh-xeo.png" alt="Bánh xèo miền Tây" loading="lazy" />
              <span class="cong-thuc-trang-thai trang-thai-duyet">✓ Đã duyệt</span>
              <div class="cong-thuc-the-hanh-dong">
                <button class="the-nut-nho" title="Chỉnh sửa" onclick="chinhSuaCongThuc('banh-xeo')">✏️</button>
                <button class="the-nut-nho xoa" title="Xóa" onclick="xacNhanXoa('banh-xeo', 'Bánh xèo miền Tây')">🗑️</button>
              </div>
            </div>
            <div class="cong-thuc-the-noi">
              <span class="the-danh-muc-nhan">Miền Nam</span>
              <div class="the-ten">Bánh xèo miền Tây giòn rụm</div>
              <div class="the-meta">
                <span>⏱️ 45 phút</span><span>👥 4 người</span><span>🔥 Dễ</span>
              </div>
              <div class="the-sao-luot">
                <div class="the-sao-nho">
                  <span class="sao-vang">★★★★★</span>
                  <span style="font-size:0.75rem; color:var(--mau-chu-mo); margin-left:4px;">(28)</span>
                </div>
                <div class="the-luot-xem">👁️ 756</div>
              </div>
            </div>
          </div>

          <div class="cong-thuc-the" data-trang-thai="da-duyet">
            <div class="cong-thuc-the-anh">
              <img src="images/mi-quang.png" alt="Mì Quảng" loading="lazy" />
              <span class="cong-thuc-trang-thai trang-thai-duyet">✓ Đã duyệt</span>
              <div class="cong-thuc-the-hanh-dong">
                <button class="the-nut-nho" title="Chỉnh sửa" onclick="chinhSuaCongThuc('mi-quang')">✏️</button>
                <button class="the-nut-nho xoa" title="Xóa" onclick="xacNhanXoa('mi-quang', 'Mì Quảng')">🗑️</button>
              </div>
            </div>
            <div class="cong-thuc-the-noi">
              <span class="the-danh-muc-nhan">Miền Trung</span>
              <div class="the-ten">Mì Quảng tôm thịt đặc sản</div>
              <div class="the-meta">
                <span>⏱️ 1.5 giờ</span><span>👥 4 người</span><span>🔥 Trung bình</span>
              </div>
              <div class="the-sao-luot">
                <div class="the-sao-nho">
                  <span class="sao-vang">★★★★☆</span>
                  <span style="font-size:0.75rem; color:var(--mau-chu-mo); margin-left:4px;">(19)</span>
                </div>
                <div class="the-luot-xem">👁️ 541</div>
              </div>
            </div>
          </div>

          <div class="cong-thuc-the" data-trang-thai="cho-duyet">
            <div class="cong-thuc-the-anh">
              <img src="images/ca-kho-to.png" alt="Cá kho tộ" loading="lazy" />
              <span class="cong-thuc-trang-thai trang-thai-cho">⏳ Chờ duyệt</span>
              <div class="cong-thuc-the-hanh-dong">
                <button class="the-nut-nho" title="Chỉnh sửa" onclick="chinhSuaCongThuc('ca-kho-to')">✏️</button>
                <button class="the-nut-nho xoa" title="Xóa" onclick="xacNhanXoa('ca-kho-to', 'Cá kho tộ')">🗑️</button>
              </div>
            </div>
            <div class="cong-thuc-the-noi">
              <span class="the-danh-muc-nhan">Miền Nam</span>
              <div class="the-ten">Cá kho tộ đậm đà chuẩn vị</div>
              <div class="the-meta">
                <span>⏱️ 1 giờ</span><span>👥 4 người</span><span>🔥 Dễ</span>
              </div>
              <div class="the-sao-luot">
                <div class="the-sao-nho">
                  <span style="font-size:0.78rem; color:var(--mau-chu-mo);">Chưa có đánh giá</span>
                </div>
                <div class="the-luot-xem">👁️ 12</div>
              </div>
            </div>
          </div>

          <div class="cong-thuc-the" data-trang-thai="nhap">
            <div class="cong-thuc-the-anh">
              <img src="images/nem-ran.png" alt="Nem rán" loading="lazy" />
              <span class="cong-thuc-trang-thai trang-thai-nhap">📝 Nháp</span>
              <div class="cong-thuc-the-hanh-dong">
                <button class="the-nut-nho" title="Chỉnh sửa" onclick="chinhSuaCongThuc('nem-ran')">✏️</button>
                <button class="the-nut-nho xoa" title="Xóa" onclick="xacNhanXoa('nem-ran', 'Nem rán truyền thống')">🗑️</button>
              </div>
            </div>
            <div class="cong-thuc-the-noi">
              <span class="the-danh-muc-nhan">Miền Bắc</span>
              <div class="the-ten">Nem rán truyền thống giòn tan</div>
              <div class="the-meta">
                <span>⏱️ 1.5 giờ</span><span>👥 6 người</span><span>🔥 Trung bình</span>
              </div>
              <div class="the-sao-luot">
                <div class="the-sao-nho">
                  <span style="font-size:0.78rem; color:var(--mau-chu-mo);">Chưa đăng</span>
                </div>
                <div class="the-luot-xem">👁️ 0</div>
              </div>
            </div>
          </div>

        </div><!-- end luoi-cong-thuc -->
      </div><!-- end tab-cong-thuc -->

      <!-- Tab: Món yêu thích -->
      <div class="ca-nhan-noi-dung-tab" id="tab-yeu-thich">
        <div class="tab-cong-cu">
          <h2 class="tab-tieu-de">Món ăn yêu thích</h2>
          <span style="font-size:0.85rem; color:var(--mau-chu-phu);" id="so-yt-hien">28 món đã lưu</span>
        </div>
        <div class="yeu-thich-luoi" id="luoi-yeu-thich">

          <div class="yeu-thich-the">
            <button class="nut-bo-yeu-thich" title="Bỏ yêu thích" onclick="boYeuThich(this, 'Bún bò Huế')">❤️</button>
            <div class="yeu-thich-the-anh"><img src="images/bun-bo-hue.png" alt="Bún bò Huế" loading="lazy" /></div>
            <div class="yeu-thich-the-noi">
              <span class="the-danh-muc-nhan">Miền Trung</span>
              <div class="the-ten">Bún bò Huế cay đậm đặc trưng</div>
              <div class="the-meta"><span>⏱️ 3 giờ</span><span>🔥 Khó</span></div>
              <div class="the-sao-luot">
                <span class="sao-vang">★★★★★</span>
                <a href="cong-thuc.php" class="nut-xem-ct">Xem →</a>
              </div>
            </div>
          </div>

          <div class="yeu-thich-the">
            <button class="nut-bo-yeu-thich" title="Bỏ yêu thích" onclick="boYeuThich(this, 'Phở bò')">❤️</button>
            <div class="yeu-thich-the-anh"><img src="images/pho-bo.png" alt="Phở bò" loading="lazy" /></div>
            <div class="yeu-thich-the-noi">
              <span class="the-danh-muc-nhan">Miền Bắc</span>
              <div class="the-ten">Phở bò Hà Nội nước trong</div>
              <div class="the-meta"><span>⏱️ 3 giờ</span><span>🔥 Trung bình</span></div>
              <div class="the-sao-luot">
                <span class="sao-vang">★★★★★</span>
                <a href="cong-thuc.php" class="nut-xem-ct">Xem →</a>
              </div>
            </div>
          </div>

          <div class="yeu-thich-the">
            <button class="nut-bo-yeu-thich" title="Bỏ yêu thích" onclick="boYeuThich(this, 'Gỏi cuốn')">❤️</button>
            <div class="yeu-thich-the-anh"><img src="images/goi-cuon.png" alt="Gỏi cuốn" loading="lazy" /></div>
            <div class="yeu-thich-the-noi">
              <span class="the-danh-muc-nhan">Miền Nam</span>
              <div class="the-ten">Gỏi cuốn tươi tôm thịt</div>
              <div class="the-meta"><span>⏱️ 30 phút</span><span>🔥 Dễ</span></div>
              <div class="the-sao-luot">
                <span class="sao-vang">★★★★☆</span>
                <a href="cong-thuc.php" class="nut-xem-ct">Xem →</a>
              </div>
            </div>
          </div>

          <div class="yeu-thich-the">
            <button class="nut-bo-yeu-thich" title="Bỏ yêu thích" onclick="boYeuThich(this, 'Canh chua cá')">❤️</button>
            <div class="yeu-thich-the-anh"><img src="images/canh-chua-ca.png" alt="Canh chua cá" loading="lazy" /></div>
            <div class="yeu-thich-the-noi">
              <span class="the-danh-muc-nhan">Miền Nam</span>
              <div class="the-ten">Canh chua cá lóc miền Nam</div>
              <div class="the-meta"><span>⏱️ 45 phút</span><span>🔥 Dễ</span></div>
              <div class="the-sao-luot">
                <span class="sao-vang">★★★★★</span>
                <a href="cong-thuc.php" class="nut-xem-ct">Xem →</a>
              </div>
            </div>
          </div>

          <div class="yeu-thich-the">
            <button class="nut-bo-yeu-thich" title="Bỏ yêu thích" onclick="boYeuThich(this, 'Bánh xèo')">❤️</button>
            <div class="yeu-thich-the-anh"><img src="images/banh-xeo.png" alt="Bánh xèo" loading="lazy" /></div>
            <div class="yeu-thich-the-noi">
              <span class="the-danh-muc-nhan">Miền Nam</span>
              <div class="the-ten">Bánh xèo giòn rụm nhân đầy</div>
              <div class="the-meta"><span>⏱️ 45 phút</span><span>🔥 Dễ</span></div>
              <div class="the-sao-luot">
                <span class="sao-vang">★★★★★</span>
                <a href="cong-thuc.php" class="nut-xem-ct">Xem →</a>
              </div>
            </div>
          </div>

          <div class="yeu-thich-the">
            <button class="nut-bo-yeu-thich" title="Bỏ yêu thích" onclick="boYeuThich(this, 'Mì Quảng')">❤️</button>
            <div class="yeu-thich-the-anh"><img src="images/mi-quang.png" alt="Mì Quảng" loading="lazy" /></div>
            <div class="yeu-thich-the-noi">
              <span class="the-danh-muc-nhan">Miền Trung</span>
              <div class="the-ten">Mì Quảng đặc sản xứ Quảng</div>
              <div class="the-meta"><span>⏱️ 1.5 giờ</span><span>🔥 Trung bình</span></div>
              <div class="the-sao-luot">
                <span class="sao-vang">★★★★☆</span>
                <a href="cong-thuc.php" class="nut-xem-ct">Xem →</a>
              </div>
            </div>
          </div>

        </div><!-- end luoi-yeu-thich -->
      </div><!-- end tab-yeu-thich -->

      <!-- Tab: Hoạt động -->
      <div class="ca-nhan-noi-dung-tab" id="tab-hoat-dong">
        <div class="tab-cong-cu">
          <h2 class="tab-tieu-de">Hoạt động của tôi</h2>
        </div>

        <div class="thong-ke-luoi">
          <div class="thong-ke-the">
            <div class="thong-ke-icon">📋</div>
            <div class="thong-ke-so-lon">12</div>
            <div class="thong-ke-nhan-the">Công thức đã đăng</div>
          </div>
          <div class="thong-ke-the">
            <div class="thong-ke-icon">❤️</div>
            <div class="thong-ke-so-lon">28</div>
            <div class="thong-ke-nhan-the">Món đã yêu thích</div>
          </div>
          <div class="thong-ke-the">
            <div class="thong-ke-icon">💬</div>
            <div class="thong-ke-so-lon">143</div>
            <div class="thong-ke-nhan-the">Bình luận nhận được</div>
          </div>
          <div class="thong-ke-the">
            <div class="thong-ke-icon">👁️</div>
            <div class="thong-ke-so-lon">5.2K</div>
            <div class="thong-ke-nhan-the">Lượt xem tổng</div>
          </div>
        </div>

        <div style="background:white; border-radius:var(--bo-lon); padding:var(--khoang-lg); box-shadow:var(--bong-nhe); border:1px solid var(--mau-vien-nhat); margin-bottom:2rem;">
          <div style="font-size:1.1rem; font-weight:700; margin-bottom:1rem;">🏆 Huy hiệu thành tích</div>
          <div class="huy-hieu-luoi">
            <div class="huy-hieu-muc"><div class="huy-hieu-bieu-tuong">👨‍🍳</div><div class="huy-hieu-ten">Đầu bếp nghiệp dư</div></div>
            <div class="huy-hieu-muc"><div class="huy-hieu-bieu-tuong">🌟</div><div class="huy-hieu-ten">Top đánh giá</div></div>
            <div class="huy-hieu-muc"><div class="huy-hieu-bieu-tuong">🎯</div><div class="huy-hieu-ten">10 công thức</div></div>
            <div class="huy-hieu-muc"><div class="huy-hieu-bieu-tuong">🔥</div><div class="huy-hieu-ten">Công thức hot</div></div>
            <div class="huy-hieu-muc" style="opacity:0.4;"><div class="huy-hieu-bieu-tuong">💎</div><div class="huy-hieu-ten">Chuyên gia ẩm thực</div></div>
            <div class="huy-hieu-muc" style="opacity:0.4;"><div class="huy-hieu-bieu-tuong">🏅</div><div class="huy-hieu-ten">50 công thức</div></div>
          </div>
        </div>

        <div style="background:white; border-radius:var(--bo-lon); padding:var(--khoang-lg); box-shadow:var(--bong-nhe); border:1px solid var(--mau-vien-nhat);">
          <div style="font-size:1.1rem; font-weight:700; margin-bottom:1rem;">📅 Hoạt động gần đây</div>
          <div>
            <div style="display:flex; gap:1rem; padding:1rem 0; border-bottom:1px solid var(--mau-vien-nhat); align-items:flex-start;">
              <div style="width:40px; height:40px; border-radius:50%; background:var(--mau-do-nhat); display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0;">📋</div>
              <div>
                <div style="font-size:0.9rem; font-weight:600;">Đã đăng công thức <strong>Cá kho tộ đậm đà</strong></div>
                <div style="font-size:0.78rem; color:var(--mau-chu-mo); margin-top:3px;">2 giờ trước · Đang chờ duyệt</div>
              </div>
            </div>
            <div style="display:flex; gap:1rem; padding:1rem 0; border-bottom:1px solid var(--mau-vien-nhat); align-items:flex-start;">
              <div style="width:40px; height:40px; border-radius:50%; background:var(--mau-do-nhat); display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0;">❤️</div>
              <div>
                <div style="font-size:0.9rem; font-weight:600;">Đã lưu yêu thích <strong>Canh chua cá lóc</strong></div>
                <div style="font-size:0.78rem; color:var(--mau-chu-mo); margin-top:3px;">1 ngày trước</div>
              </div>
            </div>
            <div style="display:flex; gap:1rem; padding:1rem 0; border-bottom:1px solid var(--mau-vien-nhat); align-items:flex-start;">
              <div style="width:40px; height:40px; border-radius:50%; background:var(--mau-do-nhat); display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0;">💬</div>
              <div>
                <div style="font-size:0.9rem; font-weight:600;">Bình luận mới trên <strong>Phở bò Hà Nội</strong></div>
                <div style="font-size:0.78rem; color:var(--mau-chu-mo); margin-top:3px;">3 ngày trước · "Công thức tuyệt vời, nước dùng trong và ngọt!"</div>
              </div>
            </div>
            <div style="display:flex; gap:1rem; padding:1rem 0; align-items:flex-start;">
              <div style="width:40px; height:40px; border-radius:50%; background:var(--mau-do-nhat); display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0;">⭐</div>
              <div>
                <div style="font-size:0.9rem; font-weight:600;">Nhận đánh giá 5 sao cho <strong>Bún chả Hà Nội</strong></div>
                <div style="font-size:0.78rem; color:var(--mau-chu-mo); margin-top:3px;">5 ngày trước</div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end tab-hoat-dong -->

      <!-- Tab: Cài đặt -->
      <div class="ca-nhan-noi-dung-tab" id="tab-chinh-sua">
        <div class="chinh-sua-layout">
          <div>
            <!-- Thông tin cơ bản -->
            <div class="chinh-sua-the">
              <div class="chinh-sua-tieu-de">👤 Thông tin cơ bản</div>
              <div class="form-nhom">
                <label class="form-nhan" for="inp-ho-ten">Họ và tên</label>
                <input type="text" id="inp-ho-ten" class="form-dau-vao" value="Nguyễn Minh Hương" placeholder="Nhập họ và tên..." />
              </div>
              <div class="form-hang-doi">
                <div class="form-nhom">
                  <label class="form-nhan" for="inp-email">Địa chỉ email</label>
                  <input type="email" id="inp-email" class="form-dau-vao" value="nguyen.minhhương@gmail.com" placeholder="Nhập email..." />
                </div>
                <div class="form-nhom">
                  <label class="form-nhan" for="inp-sdt">Số điện thoại</label>
                  <input type="tel" id="inp-sdt" class="form-dau-vao" placeholder="Nhập số điện thoại..." />
                </div>
              </div>
              <div class="form-nhom">
                <label class="form-nhan" for="inp-gioi-thieu">Giới thiệu bản thân</label>
                <textarea id="inp-gioi-thieu" class="form-dau-vao" placeholder="Hãy giới thiệu về bạn và niềm đam mê nấu ăn của bạn...">Đam mê nấu ăn từ nhỏ, yêu thích những món ăn truyền thống Việt Nam. Tôi tin rằng mỗi món ăn đều mang một câu chuyện văn hóa đẹp đẽ cần được lưu giữ và truyền lại.</textarea>
              </div>
              <div class="form-hang-doi">
                <div class="form-nhom">
                  <label class="form-nhan" for="inp-vung-mien">Vùng miền</label>
                  <select id="inp-vung-mien" class="form-dau-vao">
                    <option value="">Chọn vùng miền...</option>
                    <option value="bac" selected>Miền Bắc</option>
                    <option value="trung">Miền Trung</option>
                    <option value="nam">Miền Nam</option>
                  </select>
                </div>
                <div class="form-nhom">
                  <label class="form-nhan" for="inp-chuyen-mon">Chuyên môn nấu ăn</label>
                  <select id="inp-chuyen-mon" class="form-dau-vao">
                    <option value="nguoi-moi">Người mới bắt đầu</option>
                    <option value="nghiep-du" selected>Nấu ăn nghiệp dư</option>
                    <option value="chuyen-gia">Nấu ăn chuyên nghiệp</option>
                    <option value="dau-bep">Đầu bếp nhà hàng</option>
                  </select>
                </div>
              </div>
              <div>
                <button class="nut-luu" onclick="luuHoSo()">💾 Lưu thay đổi</button>
                <button class="nut-huy" onclick="chuyenTab('cong-thuc')">Hủy</button>
              </div>
            </div>

            <!-- Đổi mật khẩu -->
            <div class="chinh-sua-the">
              <div class="chinh-sua-tieu-de">🔒 Bảo mật tài khoản</div>
              <div class="form-nhom">
                <label class="form-nhan" for="inp-mat-khau-cu">Mật khẩu hiện tại</label>
                <input type="password" id="inp-mat-khau-cu" class="form-dau-vao" placeholder="Nhập mật khẩu hiện tại..." />
              </div>
              <div class="form-hang-doi">
                <div class="form-nhom">
                  <label class="form-nhan" for="inp-mat-khau-moi">Mật khẩu mới</label>
                  <input type="password" id="inp-mat-khau-moi" class="form-dau-vao" placeholder="Nhập mật khẩu mới..." />
                </div>
                <div class="form-nhom">
                  <label class="form-nhan" for="inp-xac-nhan-mk">Xác nhận mật khẩu mới</label>
                  <input type="password" id="inp-xac-nhan-mk" class="form-dau-vao" placeholder="Nhập lại mật khẩu mới..." />
                </div>
              </div>
              <button class="nut-luu" onclick="doiMatKhau()">🔄 Đổi mật khẩu</button>
            </div>

            <!-- Thông báo -->
            <div class="chinh-sua-the">
              <div class="chinh-sua-tieu-de">🔔 Cài đặt thông báo</div>
              <div style="display:flex; flex-direction:column; gap:1rem;">
                <label style="display:flex; align-items:center; justify-content:space-between; cursor:pointer;">
                  <div>
                    <div style="font-size:0.9rem; font-weight:600;">Bình luận mới</div>
                    <div style="font-size:0.78rem; color:var(--mau-chu-phu);">Nhận thông báo khi có bình luận mới trên công thức của bạn</div>
                  </div>
                  <input type="checkbox" checked style="width:18px; height:18px; accent-color:var(--mau-do-gach);" />
                </label>
                <label style="display:flex; align-items:center; justify-content:space-between; cursor:pointer;">
                  <div>
                    <div style="font-size:0.9rem; font-weight:600;">Đánh giá mới</div>
                    <div style="font-size:0.78rem; color:var(--mau-chu-phu);">Nhận thông báo khi có người đánh giá công thức của bạn</div>
                  </div>
                  <input type="checkbox" checked style="width:18px; height:18px; accent-color:var(--mau-do-gach);" />
                </label>
                <label style="display:flex; align-items:center; justify-content:space-between; cursor:pointer;">
                  <div>
                    <div style="font-size:0.9rem; font-weight:600;">Tin tức và chương trình đặc biệt</div>
                    <div style="font-size:0.78rem; color:var(--mau-chu-phu);">Nhận email về tin tức ẩm thực và ưu đãi hấp dẫn</div>
                  </div>
                  <input type="checkbox" style="width:18px; height:18px; accent-color:var(--mau-do-gach);" />
                </label>
              </div>
              <button class="nut-luu" style="margin-top:1rem;" onclick="luuThongBao()">💾 Lưu cài đặt</button>
            </div>
          </div>

          <!-- Cột phải -->
          <div>
            <div class="cot-phai-the">
              <div class="cot-phai-tieu-de">📷 Ảnh đại diện</div>
              <div class="anh-chinh-sua-noi">
                <div class="anh-lon">
                  N
                  <div class="anh-tai-len" title="Tải ảnh lên">📷</div>
                </div>
                <button class="nut-tai-len-anh">📁 Chọn ảnh từ máy tính</button>
                <div class="anh-ghi-chu">Định dạng: JPG, PNG, GIF<br/>Kích thước tối đa: 5MB<br/>Khuyến nghị: 400×400px</div>
              </div>
            </div>

            <div class="cot-phai-the">
              <div class="cot-phai-tieu-de">🔗 Mạng xã hội</div>
              <div class="form-nhom">
                <label class="form-nhan" for="inp-facebook">Facebook</label>
                <input type="url" id="inp-facebook" class="form-dau-vao" placeholder="https://facebook.com/..." />
              </div>
              <div class="form-nhom">
                <label class="form-nhan" for="inp-youtube">YouTube</label>
                <input type="url" id="inp-youtube" class="form-dau-vao" placeholder="https://youtube.com/..." />
              </div>
              <div class="form-nhom">
                <label class="form-nhan" for="inp-tiktok">TikTok</label>
                <input type="url" id="inp-tiktok" class="form-dau-vao" placeholder="https://tiktok.com/@..." />
              </div>
              <button class="nut-luu" style="width:100%; justify-content:center;" onclick="luuMangXaHoi()">💾 Lưu liên kết</button>
            </div>

            <div class="cot-phai-the" style="border:1.5px solid #FDECEA;">
              <div class="cot-phai-tieu-de" style="color:var(--mau-do-gach);">⚠️ Vùng nguy hiểm</div>
              <p style="font-size:0.85rem; color:var(--mau-chu-phu); margin-bottom:1rem; line-height:1.6;">Xóa tài khoản sẽ xóa toàn bộ dữ liệu của bạn, bao gồm tất cả công thức đã đăng. Hành động này không thể hoàn tác.</p>
              <button id="nut-xoa-tai-khoan" onclick="xacNhanXoaTaiKhoan()" style="width:100%; padding:10px; border:1.5px solid var(--mau-do-gach); border-radius:var(--bo-vua); background:white; color:var(--mau-do-gach); font-family:'Be Vietnam Pro',sans-serif; font-size:0.85rem; font-weight:700; cursor:pointer; transition:all var(--toc-do-nhanh);">
                🗑️ Xóa tài khoản vĩnh viễn
              </button>
            </div>
          </div>
        </div>
      </div><!-- end tab-chinh-sua -->

    </div><!-- end ca-nhan-chinh -->
  </main>

  <!-- Chân trang -->
  <footer class="chan-trang">
    <div class="chan-noi">
      <div class="chan-luoi">
        <div class="chan-cot-lon">
          <a href="index.php" class="chan-logo">
            <div class="logo-bieu-tuong" style="background:linear-gradient(135deg,var(--mau-do-gach),var(--mau-vang-cam));width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;">🍜</div>
            <div>
              <span class="logo-ten-chinh" style="color:white;font-size:1.3rem;">BẾP VIỆT</span>
              <span class="logo-slogan" style="color:rgba(255,255,255,0.6);font-size:0.72rem;display:block;">Hương vị quê nhà</span>
            </div>
          </a>
          <p class="chan-mo-ta">Nền tảng chia sẻ công thức nấu ăn Việt Nam, nơi lưu giữ và lan tỏa hương vị ẩm thực truyền thống ba miền Bắc – Trung – Nam.</p>
        </div>
        <div class="chan-cot">
          <h4 class="chan-tieu-de">Khám phá</h4>
          <ul class="chan-danh-sach">
            <li><a href="kham-pha.php?mien=bac" class="chan-lien-ket">Món ăn miền Bắc</a></li>
            <li><a href="kham-pha.php?mien=trung" class="chan-lien-ket">Món ăn miền Trung</a></li>
            <li><a href="kham-pha.php?mien=nam" class="chan-lien-ket">Món ăn miền Nam</a></li>
            <li><a href="kham-pha.php?danh-muc=chay" class="chan-lien-ket">Món ăn chay</a></li>
          </ul>
        </div>
        <div class="chan-cot">
          <h4 class="chan-tieu-de">Tài khoản</h4>
          <ul class="chan-danh-sach">
            <li><a href="tai-khoan.php" class="chan-lien-ket">Đăng nhập</a></li>
            <li><a href="tai-khoan.php#dang-ky" class="chan-lien-ket">Đăng ký</a></li>
            <li><a href="ca-nhan.php" class="chan-lien-ket">Trang cá nhân</a></li>
            <li><a href="chia-se.php" class="chan-lien-ket">Chia sẻ công thức</a></li>
          </ul>
        </div>
      </div>
      <div class="chan-duoi">
        <p>© 2024 BẾP VIỆT. Giữ hồn ẩm thực Việt – Lan tỏa vị ngon quê nhà.</p>
      </div>
    </div>
  </footer>

  <script src="js/main.js"></script>
  <script>
    // ====================================================
    // TRANG CÁ NHÂN – JavaScript
    // ====================================================

    // Chuyển tab
    function chuyenTab(tenTab) {
      document.querySelectorAll('.ca-nhan-noi-dung-tab').forEach(el => el.classList.remove('hoat-dong'));
      document.querySelectorAll('.ca-nhan-tab').forEach(el => el.classList.remove('hoat-dong'));
      var tabNoi = document.getElementById('tab-' + tenTab);
      if (tabNoi) tabNoi.classList.add('hoat-dong');
      var tabNut = document.querySelector('[data-tab="' + tenTab + '"]');
      if (tabNut) tabNut.classList.add('hoat-dong');
      window.scrollTo({ top: document.querySelector('.ca-nhan-tab-thanh').offsetTop - 72, behavior: 'smooth' });
    }

    // Lọc công thức
    function locCongThuc(nutEl, trangThai) {
      document.querySelectorAll('.loc-nut').forEach(nt => nt.classList.remove('hoat-dong'));
      nutEl.classList.add('hoat-dong');
      document.querySelectorAll('.cong-thuc-the').forEach(the => {
        the.style.display = (trangThai === 'tat-ca' || the.dataset.trangThai === trangThai) ? '' : 'none';
      });
    }

    // Xóa công thức
    var congThucCanXoa = null;
    function xacNhanXoa(id, ten) {
      congThucCanXoa = id;
      document.getElementById('modal-mo-ta').textContent = 'Bạn có chắc muốn xóa công thức "' + ten + '" không? Hành động này không thể hoàn tác.';
      document.getElementById('modal-xoa').classList.add('hien');
    }
    document.getElementById('nut-huy-xoa').addEventListener('click', function() {
      document.getElementById('modal-xoa').classList.remove('hien');
    });
    document.getElementById('nut-xac-nhan-xoa').addEventListener('click', function() {
      document.getElementById('modal-xoa').classList.remove('hien');
      hienThiThongBao('thanh-cong', '✅ Đã xóa', 'Công thức đã được xóa thành công.');
    });
    document.getElementById('modal-xoa').addEventListener('click', function(e) {
      if (e.target === this) this.classList.remove('hien');
    });

    // Chỉnh sửa công thức
    function chinhSuaCongThuc(id) {
      hienThiThongBao('canh-bao', '✏️ Chỉnh sửa', 'Đang mở trang chỉnh sửa...');
      setTimeout(function() { window.location.href = 'chia-se.php?sua=' + id; }, 1200);
    }

    // Bỏ yêu thích
    var soYeuThich = 28;
    function boYeuThich(nutEl, tenMon) {
      var the = nutEl.closest('.yeu-thich-the');
      nutEl.textContent = '🤍';
      the.style.transition = 'all 0.3s ease';
      the.style.opacity = '0';
      the.style.transform = 'scale(0.9)';
      setTimeout(function() {
        the.remove();
        soYeuThich--;
        document.getElementById('hien-thi-yt').textContent = soYeuThich;
        document.getElementById('tab-dem-yt').textContent = soYeuThich;
        document.getElementById('so-yt-hien').textContent = soYeuThich + ' món đã lưu';
        hienThiThongBao('thanh-cong', '💔 Đã bỏ lưu', 'Đã xóa "' + tenMon + '" khỏi danh sách yêu thích.');
      }, 300);
    }

    // Lưu hồ sơ
    function luuHoSo() {
      var hoTen = document.getElementById('inp-ho-ten').value.trim();
      if (!hoTen) { hienThiThongBao('loi', '❌ Lỗi', 'Vui lòng nhập họ và tên của bạn.'); return; }
      document.getElementById('hien-thi-ten').textContent = hoTen;
      hienThiThongBao('thanh-cong', '✅ Đã lưu', 'Thông tin hồ sơ đã được cập nhật thành công.');
    }

    // Đổi mật khẩu
    function doiMatKhau() {
      var cu = document.getElementById('inp-mat-khau-cu').value;
      var moi = document.getElementById('inp-mat-khau-moi').value;
      var xacNhan = document.getElementById('inp-xac-nhan-mk').value;
      if (!cu || !moi || !xacNhan) { hienThiThongBao('loi', '❌ Thiếu thông tin', 'Vui lòng điền đầy đủ thông tin mật khẩu.'); return; }
      if (moi !== xacNhan) { hienThiThongBao('loi', '❌ Mật khẩu không khớp', 'Mật khẩu mới và xác nhận không giống nhau.'); return; }
      if (moi.length < 8) { hienThiThongBao('loi', '❌ Mật khẩu quá ngắn', 'Mật khẩu phải có ít nhất 8 ký tự.'); return; }
      hienThiThongBao('thanh-cong', '🔒 Đã đổi', 'Mật khẩu đã được thay đổi thành công.');
      document.getElementById('inp-mat-khau-cu').value = '';
      document.getElementById('inp-mat-khau-moi').value = '';
      document.getElementById('inp-xac-nhan-mk').value = '';
    }

    function luuThongBao() { hienThiThongBao('thanh-cong', '🔔 Đã lưu', 'Cài đặt thông báo đã được cập nhật.'); }
    function luuMangXaHoi() { hienThiThongBao('thanh-cong', '🔗 Đã lưu', 'Liên kết mạng xã hội đã được cập nhật.'); }
    function xacNhanXoaTaiKhoan() {
      hienThiThongBao('loi', '⚠️ Xác nhận', 'Vui lòng liên hệ hỗ trợ để xóa tài khoản: support@bepviet.vn');
    }

    function chiaSeTrang() {
      if (navigator.clipboard) {
        navigator.clipboard.writeText(window.location.href).then(function() {
          hienThiThongBao('thanh-cong', '🔗 Đã sao chép', 'Đường dẫn trang cá nhân đã được sao chép vào clipboard.');
        });
      } else {
        hienThiThongBao('canh-bao', '🔗 Chia sẻ', 'Sao chép đường dẫn: ' + window.location.href);
      }
    }

    function dangXuat() {
      hienThiThongBao('thanh-cong', '👋 Tạm biệt', 'Bạn đã đăng xuất thành công.');
      setTimeout(function() { window.location.href = 'index.php'; }, 1500);
    }

    function toggleDropdown() {
      var menu = document.getElementById('dropdown-menu');
      if (menu) menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
    }

    // Hiện thị thông báo toast
    function hienThiThongBao(loai, tieuDe, chiTiet) {
      var container = document.getElementById('thong-bao-container');
      var tb = document.createElement('div');
      tb.className = 'thong-bao-muc ' + loai;
      var bieu = loai === 'thanh-cong' ? '✅' : loai === 'canh-bao' ? '⚠️' : '❌';
      tb.innerHTML = '<div class="thong-bao-bieu-tuong">' + bieu + '</div><div class="thong-bao-noi-dung"><div class="thong-bao-tieu-de">' + tieuDe + '</div><div class="thong-bao-chi-tiet">' + chiTiet + '</div></div>';
      container.appendChild(tb);
      setTimeout(function() {
        tb.style.transition = 'all 0.3s ease';
        tb.style.opacity = '0';
        tb.style.transform = 'translateX(80px)';
        setTimeout(function() { if (tb.parentNode) tb.remove(); }, 300);
      }, 3500);
    }
  </script>
</body>
</html>
