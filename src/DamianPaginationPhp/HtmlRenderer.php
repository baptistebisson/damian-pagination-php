<?php

namespace DamianPaginationPhp;

/**
 * Rendu HTML de la pagination.
 *
 * @author  Stephen Damian <contact@damian-freelance.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian
 */
final class HtmlRenderer extends RendererGenerator
{
    protected function open(): string
    {
        $html = '';

        $html .= '<nav>';
        $html .=     '<ul class="'.$this->pagination->getCssClassP().'">';

        return $html;
    }

    /**
     * Si on est pas à la 1è page, faire apparaitre : la flèche gauche (page précédante).
     */
    protected function previousLink(): string
    {
        $html = '';

        if ($this->pagination->getCssClassP() !== Pagination::CSS_CLASS_BOOTSRPAP) {
            $condition = ! $this->pagination->isFirstPage();
            $addCss = '';
        } else {
            $condition = true;
            $addCss = $this->pagination->isFirstPage() ? ' disabled' : '';
        }

        if ($condition) {
            $href = 'href="'.$this->pagination->getPreviousPageUrl().'"';

            $html .= '<li class="page-item'.$addCss.'">';
            $html .=     '<a class="page-link" rel="prev" title="'.$this->langPagination['previous'].'" '.$href.'>';
            $html .=         '&laquo;';
            $html .=     '</a>';
            $html .= '</li>';
        }

        return $html;
    }

    /**
     * Si on est pas à la 1è page, faire apparaitre : aller à première page.
     *
     * Exemple si $this->pagination->getNumberLinks() = 4 :
     * si on est après la page 6, faire apparaitre ".." pour : "1" "..." "3"
     */
    protected function firstLink(): string
    {
        $html = '';

        if (! $this->pagination->isFirstPage()) {
            $dots = $this->pagination->getCurrentPage() > ($this->pagination->getNumberLinks() + 2)
                ? '<li class="page-item"><span class="page-link">...</span></li>'
                : '';

            $href = 'href="'.$this->pagination->getFirstPageUrl().'"';

            $html .= '<li class="page-item">';
            $html .=     '<a class="page-link" title="'.$this->langPagination['first'].'" '.$href.'>';
            $html .=         '1';
            $html .=     '</a>';
            $html .= '</li>';
            $html .= $dots;
        }

        return $html;
    }

    protected function paginationActive(int $nb): string
    {
        return '<li class="page-item '.$this->pagination->getCssClassLinkActive().'"><span class="page-link">'.$nb.'</span></li>';
    }

    protected function paginationLink(int $nb): string
    {
        return '<li class="page-item"><a class="page-link" href="'.$this->pagination->getUrl($nb).'">'.$nb.'</a></li>';
    }

    /**
     * Si on est pas à la dernière page, faire apparaitre : aller à dernière page.
     *
     * Exemple si $this->pagination->getNumberLinks() = 4 :
     * si on est 5 pages avant le nombre de pages, faire apparaitre ".." pour : "avant avant dernière page" "..." "dernière page".
     */
    protected function lastLink(): string
    {
        $html = '';

        if ($this->pagination->getCurrentPage() !== $this->pagination->getPageEnd()) {
            $dots = $this->pagination->getCurrentPage() < $this->pagination->getNbPages() - ($this->pagination->getNumberLinks() + 1)
                ? '<li class="page-item"><span class="page-link">...</span></li>'
                : '';

            $href = 'href="'.$this->pagination->getLastPageUrl().'"';

            $html .= $dots;
            $html .= '<li class="page-item">';
            $html .=     '<a class="page-link" title="'.$this->langPagination['last'].'" '.$href.'>';
            $html .=         $this->pagination->getNbPages();
            $html .=     '</a>';
            $html .= '</li>';
        }

        return $html;
    }

    /**
     * Si on est pas à la dernière page, faire apparaitre : la flèche droite (page suivante).
     */
    protected function nextLink(): string
    {
        $html = '';

        if ($this->pagination->getCssClassP() !== Pagination::CSS_CLASS_BOOTSRPAP) {
            $condition = $this->pagination->getCurrentPage() !== $this->pagination->getPageEnd();
            $addCss = '';
        } else {
            $condition = true;
            $addCss = $this->pagination->isLastPage() ? ' disabled' : '';
        }

        if ($condition) {
            $href = 'href="'.$this->pagination->getNextPageUrl().'"';

            $html .= '<li class="page-item'.$addCss.'">';
            $html .=     '<a class="page-link" rel="next" title="'.$this->langPagination['next'].'" '.$href.'>';
            $html .=         '&raquo;';
            $html .=     '</a>';
            $html .= '</li>';
        }

        return $html;
    }

    protected function close(): string
    {
        $html = '';

        $html .=     '</ul>';
        $html .= '</nav>';

        return $html;
    }

    protected function perPageOnchange(): string
    {
        return 'onchange="document.getElementById(\''.$this->pagination->getCssIdPP().'\').submit()"';
    }

    protected function perPageOpenForm(string $actionPerPage): string
    {
        return '<form id="'.$this->pagination->getCssIdPP().'" action="'.$actionPerPage.'" method="get">';
    }

    protected function perPageLabel(): string
    {
        return '<label for="nb-perpage">'.$this->langPagination['per_page'].' : </label>';
    }

    protected function perPageOpenSelect(string $onChange): string
    {
        return '<select '.$onChange.' name="'.Pagination::PER_PAGE_NAME.'" id="nb-perpage">';
    }

    protected function perPageOption(string $selected, string $valuePP, string $all = null): string
    {
        $nb = $all ?? $valuePP;

        return '<option '.$selected.' value="'.$valuePP.'">'.$nb.'</option>';
    }

    protected function perPageCloseSelect(): string
    {
        return '</select>';
    }

    protected function perPageCloseForm(): string
    {
        return '</form>';
    }
}
