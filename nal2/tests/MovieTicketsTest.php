<?php
use PHPUnit\Framework\TestCase;


class MovieTicketsTest extends TestCase
{
    /* =====================================================
     * FUNKCIJE ZA TESTIRANJE
     * ===================================================== */

    // 1️ Preveri veljavnost e-poštnega naslova
    public function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // 2️ Izračuna skupno ceno vstopnic
    public function calculateTicketPrice($numTickets, $basePrice) {
        if ($numTickets < 0 || $basePrice < 0) return false;
        return $numTickets * $basePrice;
    }

    // 3️ Preveri razpoložljivost sedežev
    public function checkSeatAvailability($requested, $available) {
        if ($requested <= 0 || $available < 0) return false;
        return $requested <= $available;
    }

    // 4️ Formatira naslov filma
    public function formatMovieTitle($title) {
        if (empty($title)) return "";
        return ucwords(strtolower(trim($title)));
    }

    // 5️ Izračuna končno ceno s popustom
    public function calculateDiscount($price, $discountPercent) {
        if ($price < 0 || $discountPercent < 0 || $discountPercent > 100) return false;
        return $price - ($price * ($discountPercent / 100));
    }

    /* =====================================================
     * UNIT TESTI
     * ===================================================== */

    /*** TEST 1: validateEmail() ***/
    public function testValidateEmailPositive() {
        $this->assertTrue($this->validateEmail("user@example.com"));
    }
    public function testValidateEmailNegative() {
        $this->assertFalse($this->validateEmail("invalid@@example"));
    }
    public function testValidateEmailEdge() {
        $this->assertTrue($this->validateEmail("a@b.co"));
    }

    /*** TEST 2: calculateTicketPrice() ***/
    public function testCalculateTicketPricePositive() {
        $this->assertEquals(30, $this->calculateTicketPrice(3, 10));
    }
    public function testCalculateTicketPriceNegative() {
        $this->assertFalse($this->calculateTicketPrice(-2, 10));
    }
    public function testCalculateTicketPriceEdge() {
        $this->assertEquals(0, $this->calculateTicketPrice(0, 15));
    }

    /*** TEST 3: checkSeatAvailability() ***/
    public function testCheckSeatAvailabilityPositive() {
        $this->assertTrue($this->checkSeatAvailability(3, 10));
    }
    public function testCheckSeatAvailabilityNegative() {
        $this->assertFalse($this->checkSeatAvailability(12, 5));
    }
    public function testCheckSeatAvailabilityEdge() {
        $this->assertTrue($this->checkSeatAvailability(5, 5));
    }

    /*** TEST 4: formatMovieTitle() ***/
    public function testFormatMovieTitlePositive() {
        $this->assertEquals("The Matrix", $this->formatMovieTitle("the matrix"));
    }
    public function testFormatMovieTitleNegative() {
        $this->assertEquals("", $this->formatMovieTitle(""));
    }
    public function testFormatMovieTitleEdge() {
        $this->assertEquals("Up", $this->formatMovieTitle("up"));
    }

    /*** TEST 5: calculateDiscount() ***/
    public function testCalculateDiscountPositive() {
        $this->assertEquals(80, $this->calculateDiscount(100, 20));
    }
    public function testCalculateDiscountNegative() {
        $this->assertFalse($this->calculateDiscount(100, 150));
    }
    public function testCalculateDiscountEdge() {
        $this->assertEquals(0, $this->calculateDiscount(100, 100));
    }
}
