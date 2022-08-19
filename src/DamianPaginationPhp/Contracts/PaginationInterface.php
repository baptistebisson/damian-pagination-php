<?php

namespace DamianPaginationPhp\Contracts;

/**
 * @author  Stephen Damian <contact@devandweb.fr>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    https://github.com/s-damian/damian-pagination-php
 */
interface PaginationInterface
{
    /**
     * @param array<mixed> $options
     */
    public function __construct(array $options = []);

    public function paginate(int $count): void;

    public function getOffset(): ?int;

    public function getLimit(): ?int;

    public function getCount(): int;

    public function getCountOnCurrentPage(): int;

    public function getFrom(): int;

    public function getTo(): int;

    public function getCurrentPage(): int;

    public function getNbPages(): int;

    public function getPerPage(): ?int;

    public function getDefaultPerPage(): ?int;

    public function hasPages(): bool;

    public function hasMorePages(): bool;

    public function isFirstPage(): bool;

    public function isLastPage(): bool;

    public function isPage(int $nb): bool;

    public function getPreviousPageUrl(): ?string;

    public function getNextPageUrl(): ?string;

    public function getFirstPageUrl(): string;

    public function getLastPageUrl(): string;

    public function getUrl(int $nb): string;

    public function getGetPP(): null|int|string;

    public function getPageStart(): int;

    public function getPageEnd(): int;

    public function getNumberLinks(): int;

    public function getCssClassP(): string;

    public function getCssClassLinkActive(): string;

    public function getCssIdPP(): string;

    /**
     * @return array<mixed>
     */
    public function getArrayOptionsSelect(): array;

    public function render(): string;

    /**
     * @param array<string, string> $options
     */
    public function perPageForm(array $options = []): string;
}
