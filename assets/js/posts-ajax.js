document.addEventListener('DOMContentLoaded', function () {
  const loadBtn = document.getElementById('load-more');
  const grid = document.querySelector('.post-grid');
  const selectYear = document.getElementById('filter-year');
  const selectCategory = document.getElementById('filter-category');

  let currentPage = 1;

  function getFilters() {
    return {
      year: selectYear?.value || '',
      category: selectCategory?.value || ''
    };
  }

  function loadPosts(reset = false) {
    const filters = getFilters();

    if (reset) {
      currentPage = 1;
      grid.innerHTML = '';
    } else {
      currentPage++;
    }

    const params = new URLSearchParams();
    params.append('action', 'loomi_load_more');
    params.append('paged', currentPage);
    if (filters.year) params.append('year', filters.year);
    if (filters.category) params.append('category', filters.category);

    if (loadBtn) {
      loadBtn.disabled = true;
      loadBtn.innerText = 'Carregando...';
    }

    fetch(loomi_ajax.ajax_url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: params
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        grid.insertAdjacentHTML('beforeend', data.data.html);

        if (!data.data.has_more && loadBtn) {
          loadBtn.remove(); // remove se não há mais posts
        } else if (loadBtn) {
          loadBtn.disabled = false;
          loadBtn.innerText = 'Ver mais ⬇';
        }
      } else {
        if (currentPage === 1) {
          grid.innerHTML = '<p class="no-posts-found">Nenhum resultado encontrado.</p>';
        }
        if (loadBtn) loadBtn.remove();
      }
    });
  }

  if (loadBtn) {
    loadBtn.addEventListener('click', () => loadPosts());
  }

  if (selectYear) {
    selectYear.addEventListener('change', () => loadPosts(true));
  }

  if (selectCategory) {
    selectCategory.addEventListener('change', () => loadPosts(true));
  }
});
