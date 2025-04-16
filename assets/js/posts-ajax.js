document.addEventListener('DOMContentLoaded', function () {
  const loadBtn = document.getElementById('load-more');
  const grid = document.querySelector('.post-grid');
  const spinner = document.querySelector('.spinner');
  const selectYear = document.getElementById('filter-year');
  const selectCategory = document.getElementById('filter-category');

  let currentPage = 1;

  function getFilters() {
    return {
      year: selectYear?.value || '',
      category: selectCategory?.value || ''
    };
  }

  function showLoading() {
    grid.classList.add('loading');
    if (spinner) spinner.style.display = 'block';
  }

  function hideLoading() {
    grid.classList.remove('loading');
    if (spinner) spinner.style.display = 'none';
  }

  function updateLoadMoreVisibility(hasMore) {
    if (!loadBtn) return;

    if (hasMore) {
      loadBtn.style.display = 'inline-flex';
      loadBtn.disabled = false;
      loadBtn.innerText = 'Ver mais';
    } else {
      loadBtn.style.display = 'none';
    }
  }

  function shouldShowLoadMore() {
    return document.querySelectorAll('.post-card').length >= 8;
  }

  function loadPosts(reset = false, showLoadingBtnText = true) {
    const filters = getFilters();

    if (reset) {
      currentPage = 1;
      grid.innerHTML = '';
    } else {
      currentPage++;
    }

    showLoading();

    const params = new URLSearchParams();
    params.append('action', 'loomi_load_more');
    params.append('paged', currentPage);
    if (filters.year) params.append('year', filters.year);
    if (filters.category) params.append('category', filters.category);

    if (loadBtn && showLoadingBtnText) {
      loadBtn.disabled = true;
      loadBtn.innerText = 'Carregando...';
    }

    setTimeout(() => {
      fetch(loomi_ajax.ajax_url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: params
      })
        .then(res => res.json())
        .then(data => {
          hideLoading();

          if (data.success) {
            grid.insertAdjacentHTML('beforeend', data.data.html);
            updateLoadMoreVisibility(data.data.has_more);
          } else {
            if (currentPage === 1) {
              grid.innerHTML = '<p class="no-posts-found">Nenhum resultado encontrado.</p>';
            }
            updateLoadMoreVisibility(false);
          }
        })
        .catch(() => {
          hideLoading();
          updateLoadMoreVisibility(false);
        });
    }, 200);
  }

  if (loadBtn) {
    loadBtn.addEventListener('click', () => {
      loadPosts(false, true);
    });
  }

  if (selectYear) {
    selectYear.addEventListener('change', () => {
      loadPosts(true, false);
      setTimeout(() => {
        if (loadBtn && shouldShowLoadMore()) {
          loadBtn.style.display = 'inline-flex';
        } else if (loadBtn) {
          loadBtn.style.display = 'none';
        }
      }, 400);
    });
  }

  if (selectCategory) {
    selectCategory.addEventListener('change', () => {
      loadPosts(true, false);
      setTimeout(() => {
        if (loadBtn && shouldShowLoadMore()) {
          loadBtn.style.display = 'inline-flex';
        } else if (loadBtn) {
          loadBtn.style.display = 'none';
        }
      }, 400);
    });
  }
});
