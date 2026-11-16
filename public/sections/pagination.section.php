<!-- Pagination Footer -->

<?php $currentPage  = max(1, (int) ($_GET['pg'] ?? 1));
$totalPerPage = max(1, (int) ($loopSequence ?? 24));
$from = (($currentPage * $totalPerPage) - $totalPerPage); ?>
<div class="card-footer bg-transparent border-secondary px-4 py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
    <span class="text-white small">Showing <strong><?= $from === 0 ? 1 : $from ?> - <?= count($paginationData ?? []) ?></strong> of <strong><?= $paginationDataCount ?? 0 ?></strong> ledger entries</span>
    <nav aria-label="Transaction history pagination">
        <ul class="pagination pagination-sm mb-0">
 
            <?php


            $totalCount   = max(0, (int) ($paginationDataCount ?? 0));

            $totalPages = (int) ceil($totalCount / $totalPerPage);

            // Nothing to paginate
            if ($totalPages > 1) {
                $window = 2;
                $pages = [];

                // Always show first page
                $pages[] = 1;

                // Pages around current page
                $start = max(2, $currentPage - $window);
                $end   = min($totalPages - 1, $currentPage + $window);

                // Ellipsis after first page
                if ($start > 2) {
                    $pages[] = '...';
                }

                for ($i = $start; $i <= $end; $i++) {
                    $pages[] = $i;
                }

                // Ellipsis before last page
                if ($end < $totalPages - 1) {
                    $pages[] = '...';
                }

                // Always show last page
                if ($totalPages > 1) {
                    $pages[] = $totalPages;
                }


                // Previous
                if ($currentPage > 1) {
            ?>

                    <li class="page-item  ">
                        <a class="page-link bg-dark border-secondary text-white" href="<?= CustomFunctions::formatDynamicUrl('pg', (string) ($currentPage - 1)) ?>" tabindex="-1">Previous</a>
                    </li>
                    <?php
                }


                // Page numbers
                foreach ($pages as $page) {

                    if ($page === '...') {
                    ?>
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    <?php
                        continue;
                    }

                    ?>
                    <li class="page-item <?= ($currentPage == $page) ? 'active' : '' ?>">
                        <a class="page-link bg-dark border-secondary text-light" href="<?= CustomFunctions::formatDynamicUrl('pg', (string) $page) ?>"><?= $page ?></a>
                    </li>
                <?php
                }


                // Next
                if ($currentPage < $totalPages) {
                ?>
                    <li class="page-item">
                        <a class="page-link bg-dark border-secondary text-light" href="<?= CustomFunctions::formatDynamicUrl('pg', (string) ($currentPage + 1)) ?>">Next</a>
                    </li>
            <?php
                }
            }
            ?>

        </ul>
    </nav>
</div>
<!--------------------------------->