/**
 * BẾP VIỆT – JavaScript Chính
 * Mã hóa: UTF-8 | Ngôn ngữ: Tiếng Việt
 */

'use strict';

// ============================================================
// KHỞI TẠO
// ============================================================
document.addEventListener('DOMContentLoaded', function () {
  khoiTaoNavbar();
  khoiTaoHieuUngCuon();
  khoiTaoNutCuonLen();
  khoiTaoTheMonAn();
  khoiTaoTimKiem();
  khoiTaoBoLoc();
});

// ============================================================
// NAVBAR – THANH ĐIỀU HƯỚNG
// ============================================================
function khoiTaoNavbar() {
  const navbar = document.querySelector('.navbar');
  const nutMenu = document.querySelector('.nut-menu-mobile');
  const navMenu = document.querySelector('.nav-menu');
  const navNutNhom = document.querySelector('.nav-nut-nhom');

  // Hiệu ứng cuộn
  if (navbar) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 50) {
        navbar.classList.add('cuon-xuong');
      } else {
        navbar.classList.remove('cuon-xuong');
      }
    });
  }

  // Menu di động
  if (nutMenu && navMenu) {
    nutMenu.addEventListener('click', function () {
      navMenu.classList.toggle('mo');
      if (navNutNhom) navNutNhom.classList.toggle('mo');
      const dangMo = navMenu.classList.contains('mo');
      nutMenu.querySelectorAll('span')[0].style.transform = dangMo ? 'rotate(45deg) translate(5px, 5px)' : '';
      nutMenu.querySelectorAll('span')[1].style.opacity = dangMo ? '0' : '';
      nutMenu.querySelectorAll('span')[2].style.transform = dangMo ? 'rotate(-45deg) translate(5px, -5px)' : '';
    });

    // Đóng menu khi nhấp bên ngoài
    document.addEventListener('click', function (e) {
      if (!nutMenu.contains(e.target) && !navMenu.contains(e.target)) {
        navMenu.classList.remove('mo');
        if (navNutNhom) navNutNhom.classList.remove('mo');
        nutMenu.querySelectorAll('span').forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
      }
    });
  }

  // Đánh dấu trang hiện tại
  const trangHienTai = window.location.pathname.split('/').pop() || 'index.php';
  document.querySelectorAll('.nav-lien-ket').forEach(lk => {
    const href = lk.getAttribute('href');
    if (href === trangHienTai || (trangHienTai === '' && href === 'index.php')) {
      lk.classList.add('hoat-dong');
    }
  });
}

// ============================================================
// HIỆU ỨNG CUỘN XUẤT HIỆN
// ============================================================
function khoiTaoHieuUngCuon() {
  const phanTu = document.querySelectorAll('.hieu-ung-tai');

  if (!phanTu.length) return;

  const quanSat = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry, index) {
      if (entry.isIntersecting) {
        setTimeout(function () {
          entry.target.classList.add('hien');
        }, index * 80);
        quanSat.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

  phanTu.forEach(function (ptu) {
    quanSat.observe(ptu);
  });
}

// ============================================================
// NÚT CUỘN LÊN ĐẦU TRANG
// ============================================================
function khoiTaoNutCuonLen() {
  const nut = document.querySelector('.nut-cuon-len');
  if (!nut) return;

  window.addEventListener('scroll', function () {
    if (window.scrollY > 400) {
      nut.classList.add('hien');
    } else {
      nut.classList.remove('hien');
    }
  });

  nut.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

// ============================================================
// THẺ MÓN ĂN – NÚT YÊU THÍCH
// ============================================================
function khoiTaoTheMonAn() {
  document.addEventListener('click', function (e) {
    const nutYeuThich = e.target.closest('.the-mon-an-yeu-thich');
    if (!nutYeuThich) return;

    const daLuu = nutYeuThich.classList.toggle('da-luu');
    const tenMon = nutYeuThich.closest('.the-mon-an')?.querySelector('.the-mon-an-ten')?.textContent || 'Món ăn';

    if (daLuu) {
      nutYeuThich.textContent = '❤️';
      hienThongBao('✅ Đã lưu "' + tenMon + '" vào yêu thích!', 'thanh-cong');
    } else {
      nutYeuThich.textContent = '🤍';
      hienThongBao('💔 Đã xóa "' + tenMon + '" khỏi yêu thích.', 'canh-bao');
    }
  });
}

// ============================================================
// TÌM KIẾM MÓN ĂN
// ============================================================
function khoiTaoTimKiem() {
  // Hero search
  const heroTimKiem = document.querySelector('.hero-tim-kiem');
  if (heroTimKiem) {
    heroTimKiem.addEventListener('submit', function (e) {
      e.preventDefault();
      const giaTri = heroTimKiem.querySelector('input')?.value?.trim();
      if (giaTri) {
        window.location.href = 'kham-pha.php?tim=' + encodeURIComponent(giaTri);
      } else {
        window.location.href = 'kham-pha.php';
      }
    });

    const nutTimKiem = heroTimKiem.querySelector('.hero-tim-kiem-nut');
    if (nutTimKiem) {
      nutTimKiem.addEventListener('click', function () {
        const giaTri = heroTimKiem.querySelector('input')?.value?.trim();
        if (giaTri) {
          window.location.href = 'kham-pha.php?tim=' + encodeURIComponent(giaTri);
        } else {
          window.location.href = 'kham-pha.php';
        }
      });
    }
  }

  // Trang khám phá
  const oTimKiem = document.querySelector('#o-tim-kiem');
  if (oTimKiem) {
    // Lấy từ khóa từ URL
    const params = new URLSearchParams(window.location.search);
    const tuKhoa = params.get('tim');
    if (tuKhoa) {
      oTimKiem.value = tuKhoa;
      locMonAn();
    }

    oTimKiem.addEventListener('input', debounce(locMonAn, 300));
  }
}

// ============================================================
// BỘ LỌC MÓN ĂN
// ============================================================
function khoiTaoBoLoc() {
  const selects = document.querySelectorAll('.bo-loc-select');
  selects.forEach(function (sel) {
    sel.addEventListener('change', locMonAn);
  });
}

function locMonAn() {
  const oTimKiem = document.querySelector('#o-tim-kiem');
  const selVungMien = document.querySelector('#loc-vung-mien');
  const selDanhMuc = document.querySelector('#loc-danh-muc');
  const selDoKho = document.querySelector('#loc-do-kho');
  const selSapXep = document.querySelector('#sap-xep');
  const danhSachMon = document.querySelectorAll('.the-mon-an[data-ten]');

  if (!danhSachMon.length) return;

  const tuKhoa = oTimKiem?.value?.toLowerCase().trim() || '';
  const vungMien = selVungMien?.value || '';
  const danhMuc = selDanhMuc?.value || '';
  const doKho = selDoKho?.value || '';

  let demHien = 0;

  danhSachMon.forEach(function (the) {
    const ten = (the.dataset.ten || '').toLowerCase();
    const mien = the.dataset.mien || '';
    const loai = the.dataset.loai || '';
    const kho = the.dataset.dokho || '';

    const khopTuKhoa = !tuKhoa || ten.includes(tuKhoa);
    const khopMien = !vungMien || mien === vungMien;
    const khopDanhMuc = !danhMuc || loai === danhMuc;
    const khopDoKho = !doKho || kho === doKho;

    if (khopTuKhoa && khopMien && khopDanhMuc && khopDoKho) {
      the.style.display = '';
      demHien++;
    } else {
      the.style.display = 'none';
    }
  });

  // Cập nhật đếm kết quả
  const demKQ = document.querySelector('#dem-ket-qua');
  if (demKQ) {
    demKQ.textContent = demHien + ' món';
  }

  // Hiển thị thông báo không có kết quả
  const khongCo = document.querySelector('#khong-co-ket-qua');
  if (khongCo) {
    khongCo.style.display = demHien === 0 ? 'block' : 'none';
  }
}

// ============================================================
// DANH MỤC FILTER
// ============================================================
document.addEventListener('click', function (e) {
  const danhMucThe = e.target.closest('.danh-muc-the');
  if (!danhMucThe) return;

  document.querySelectorAll('.danh-muc-the').forEach(d => d.classList.remove('hoat-dong'));
  danhMucThe.classList.add('hoat-dong');

  const loai = danhMucThe.dataset.loai;
  const selDanhMuc = document.querySelector('#loc-danh-muc');
  if (selDanhMuc && loai) {
    selDanhMuc.value = loai;
    locMonAn();
  }
});

// ============================================================
// FORM CHIA SẺ CÔNG THỨC
// ============================================================
function khoiTaoFormChiaSe() {
  khoiTaoNguyenLieuDong();
  khoiTaoBuocCheGBien();
  khoiTaoUploadAnh();
  khoiTaoFormValidation();
}

function khoiTaoNguyenLieuDong() {
  const nutThem = document.querySelector('#nut-them-nguyen-lieu');
  const container = document.querySelector('#nguyen-lieu-container');
  if (!nutThem || !container) return;

  nutThem.addEventListener('click', function () {
    const so = container.children.length + 1;
    const muc = document.createElement('div');
    muc.className = 'nguyen-lieu-muc';
    muc.innerHTML = `
      <input type="text" class="form-o-nhap" placeholder="Tên nguyên liệu (vd: Thịt bò)" />
      <input type="text" class="form-o-nhap so-luong" placeholder="Số lượng (vd: 500g)" />
      <button type="button" class="nut-xoa-muc" title="Xóa nguyên liệu">✕</button>
    `;
    muc.querySelector('.nut-xoa-muc').addEventListener('click', function () {
      muc.remove();
    });
    container.appendChild(muc);
  });

  // Nút xóa ban đầu
  container.querySelectorAll('.nut-xoa-muc').forEach(function (nut) {
    nut.addEventListener('click', function () {
      nut.closest('.nguyen-lieu-muc').remove();
    });
  });
}

function khoiTaoBuocCheGBien() {
  const nutThem = document.querySelector('#nut-them-buoc');
  const container = document.querySelector('#buoc-container');
  if (!nutThem || !container) return;

  function capNhatSoBuoc() {
    container.querySelectorAll('.buoc-so-nhan').forEach(function (el, idx) {
      el.textContent = idx + 1;
    });
  }

  nutThem.addEventListener('click', function () {
    const muc = document.createElement('div');
    muc.className = 'buoc-che-bien-muc';
    muc.innerHTML = `
      <div class="buoc-so-nhan">?</div>
      <textarea class="form-vung-nhap" placeholder="Mô tả chi tiết bước thực hiện..." rows="3"></textarea>
      <button type="button" class="nut-xoa-muc" title="Xóa bước">✕</button>
    `;
    muc.querySelector('.nut-xoa-muc').addEventListener('click', function () {
      muc.remove();
      capNhatSoBuoc();
    });
    container.appendChild(muc);
    capNhatSoBuoc();
  });

  container.querySelectorAll('.nut-xoa-muc').forEach(function (nut) {
    nut.addEventListener('click', function () {
      nut.closest('.buoc-che-bien-muc').remove();
      capNhatSoBuoc();
    });
  });
}

function khoiTaoUploadAnh() {
  const uploadKhu = document.querySelector('.upload-anh');
  const uploadInput = uploadKhu?.querySelector('input[type="file"]');
  const preview = document.querySelector('#anh-preview');

  if (!uploadInput) return;

  uploadInput.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    if (!file.type.startsWith('image/')) {
      hienThongBao('⚠️ Vui lòng chọn file hình ảnh!', 'loi');
      return;
    }

    if (file.size > 5 * 1024 * 1024) {
      hienThongBao('⚠️ Hình ảnh không được vượt quá 5MB!', 'loi');
      return;
    }

    const reader = new FileReader();
    reader.onload = function (e) {
      if (preview) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        uploadKhu.querySelector('.upload-noi-dung').style.display = 'none';
        uploadKhu.querySelector('.upload-bieu-tuong').style.display = 'none';
      }
    };
    reader.readAsDataURL(file);
  });
}

function khoiTaoFormValidation() {
  const form = document.querySelector('#form-chia-se');
  if (!form) return;

  const nutXemTruoc = document.querySelector('#nut-xem-truoc');
  const nutDang = document.querySelector('#nut-dang');

  if (nutXemTruoc) {
    nutXemTruoc.addEventListener('click', function () {
      if (kiemTraForm(form)) {
        hienThongBao('👀 Chức năng xem trước sẽ sớm ra mắt!', 'canh-bao');
      }
    });
  }

  if (nutDang) {
    nutDang.addEventListener('click', function (e) {
      e.preventDefault();
      if (kiemTraForm(form)) {
        nutDang.disabled = true;
        nutDang.textContent = 'Đang đăng...';

        // Giả lập gửi dữ liệu
        setTimeout(function () {
          hienThongBao('🎉 Công thức đã được đăng thành công! Cảm ơn bạn đã chia sẻ.', 'thanh-cong');
          nutDang.disabled = false;
          nutDang.textContent = 'Đăng công thức';
          form.reset();
        }, 1500);
      }
    });
  }
}

function kiemTraForm(form) {
  let hopLe = true;
  const truongBatBuoc = form.querySelectorAll('[required]');

  truongBatBuoc.forEach(function (truong) {
    const thongBaoLoi = truong.parentNode.querySelector('.form-thong-bao-loi');

    if (!truong.value.trim()) {
      truong.classList.add('loi');
      if (thongBaoLoi) thongBaoLoi.classList.add('hien');
      hopLe = false;
    } else {
      truong.classList.remove('loi');
      if (thongBaoLoi) thongBaoLoi.classList.remove('hien');
    }
  });

  if (!hopLe) {
    hienThongBao('⚠️ Vui lòng điền đầy đủ các trường bắt buộc!', 'loi');
    const truongLoiDau = form.querySelector('.loi');
    if (truongLoiDau) {
      truongLoiDau.scrollIntoView({ behavior: 'smooth', block: 'center' });
      truongLoiDau.focus();
    }
  }

  return hopLe;
}

// ============================================================
// FORM ĐĂNG NHẬP / ĐĂNG KÝ
// ============================================================
function khoiTaoFormTaiKhoan() {
  const tabDangNhap = document.querySelector('#tab-dang-nhap');
  const tabDangKy = document.querySelector('#tab-dang-ky');
  const formDangNhap = document.querySelector('#form-dang-nhap');
  const formDangKy = document.querySelector('#form-dang-ky');

  if (!tabDangNhap || !tabDangKy) return;

  // Chuyển tab từ URL
  const params = new URLSearchParams(window.location.search);
  if (params.get('tab') === 'dang-ky') {
    chuyenTab('dang-ky');
  }

  tabDangNhap.addEventListener('click', function () { chuyenTab('dang-nhap'); });
  tabDangKy.addEventListener('click', function () { chuyenTab('dang-ky'); });

  function chuyenTab(tab) {
    if (tab === 'dang-nhap') {
      tabDangNhap.classList.add('hoat-dong');
      tabDangKy.classList.remove('hoat-dong');
      if (formDangNhap) formDangNhap.style.display = 'block';
      if (formDangKy) formDangKy.style.display = 'none';
    } else {
      tabDangKy.classList.add('hoat-dong');
      tabDangNhap.classList.remove('hoat-dong');
      if (formDangNhap) formDangNhap.style.display = 'none';
      if (formDangKy) formDangKy.style.display = 'block';
    }
  }

  // Xử lý đăng nhập
  if (formDangNhap) {
    formDangNhap.addEventListener('submit', function (e) {
      e.preventDefault();
      const nut = this.querySelector('[type="submit"]');
      nut.disabled = true;
      nut.textContent = 'Đang đăng nhập...';

      setTimeout(function () {
        hienThongBao('✅ Đăng nhập thành công! Chào mừng bạn trở lại!', 'thanh-cong');
        setTimeout(function () {
          window.location.href = 'ca-nhan.php';
        }, 1000);
      }, 1000);
    });
  }

  // Xử lý đăng ký
  if (formDangKy) {
    formDangKy.addEventListener('submit', function (e) {
      e.preventDefault();
      const matKhau = this.querySelector('#mat-khau')?.value;
      const nhapLaiMK = this.querySelector('#nhap-lai-mat-khau')?.value;

      if (matKhau !== nhapLaiMK) {
        hienThongBao('❌ Mật khẩu không khớp! Vui lòng kiểm tra lại.', 'loi');
        return;
      }

      const nut = this.querySelector('[type="submit"]');
      nut.disabled = true;
      nut.textContent = 'Đang tạo tài khoản...';

      setTimeout(function () {
        hienThongBao('🎉 Tạo tài khoản thành công! Chào mừng bạn đến với BẾP VIỆT!', 'thanh-cong');
        setTimeout(function () {
          window.location.href = 'ca-nhan.php';
        }, 1000);
      }, 1200);
    });
  }

  // Hiển thị/ẩn mật khẩu
  document.querySelectorAll('.nut-hien-mat-khau').forEach(function (nut) {
    nut.addEventListener('click', function () {
      const oNhap = this.previousElementSibling;
      if (oNhap && oNhap.type) {
        const dangHien = oNhap.type === 'text';
        oNhap.type = dangHien ? 'password' : 'text';
        this.textContent = dangHien ? '👁️' : '🙈';
      }
    });
  });
}

// ============================================================
// ĐÁNH GIÁ SAO (INTERACTIVE)
// ============================================================
function khoiTaoDanhGiaSao() {
  const khuVucSao = document.querySelector('#danh-gia-sao-tuong-tac');
  if (!khuVucSao) return;

  const saoList = khuVucSao.querySelectorAll('.sao-tuong-tac');
  let saoHienTai = 0;

  saoList.forEach(function (sao, idx) {
    sao.addEventListener('mouseover', function () {
      capNhatSao(idx + 1);
    });

    sao.addEventListener('click', function () {
      saoHienTai = idx + 1;
      capNhatSao(saoHienTai);
      hienThongBao('⭐ Cảm ơn bạn đã đánh giá ' + saoHienTai + ' sao!', 'thanh-cong');
    });
  });

  khuVucSao.addEventListener('mouseleave', function () {
    capNhatSao(saoHienTai);
  });

  function capNhatSao(so) {
    saoList.forEach(function (sao, idx) {
      sao.textContent = idx < so ? '⭐' : '☆';
    });
  }
}

// ============================================================
// THÔNG BÁO TOAST
// ============================================================
function hienThongBao(noiDung, loai) {
  loai = loai || 'thanh-cong';

  let container = document.querySelector('.thong-bao-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'thong-bao-container';
    document.body.appendChild(container);
  }

  const thongBao = document.createElement('div');
  thongBao.className = 'thong-bao thong-bao-' + loai;
  thongBao.innerHTML = `
    <span style="flex:1; font-size:0.9rem;">${noiDung}</span>
    <button onclick="this.parentNode.remove()" style="background:none;border:none;cursor:pointer;font-size:1rem;color:#999;padding:0 4px;">✕</button>
  `;

  container.appendChild(thongBao);

  // Tự động đóng sau 4 giây
  setTimeout(function () {
    if (thongBao.parentNode) {
      thongBao.classList.add('bien-mat');
      setTimeout(function () { thongBao.remove(); }, 300);
    }
  }, 4000);
}

// ============================================================
// TIỆN ÍCH
// ============================================================
function debounce(fn, delay) {
  let timer;
  return function () {
    clearTimeout(timer);
    timer = setTimeout(fn, delay);
  };
}

// Xuất các hàm cần thiết
window.BepViet = {
  hienThongBao,
  khoiTaoFormChiaSe,
  khoiTaoFormTaiKhoan,
  khoiTaoDanhGiaSao,
  locMonAn
};

// Khởi tạo theo trang
// Lưu ý: Mỗi trang đã có inline script riêng khởi tạo các chức năng đặc thù.
// main.js chỉ xử lý các chức năng chung (navbar, hiệu ứng cuộn, nút yêu thích, tìm kiếm, bộ lọc)
const tenTrang = window.location.pathname.split('/').pop();
// Không tự động gọi khoiTaoFormChiaSe, khoiTaoDanhGiaSao, khoiTaoFormTaiKhoan ở đây
// để tránh chạy trùng với inline scripts trong từng trang
