# Poročilo o sistemskem testu — Performance test

**Projekt:** MovieTickets (PHP)

**Avtor:** Nino Lisjak

**Datum izvedbe:** 10. november 2025

**Orodje:** Apache JMeter 5.6.3

**Vrsta testa:** Performance test (odzivnost javnih strani)

---

## 1. Namen testa
Cilj testiranja je bil preveriti odzivnost in zmogljivost spletne aplikacije *MovieTickets* pri obremenitvi več hkratnih uporabnikov. Test zajema samo javne strani brez prijave.

## 2. Konfiguracija testa
- **Strežnik:** lokalni Apache (XAMPP) na `localhost:80`
- **Testne strani:**
  - `/MovieTickets/index.php`
  - `/MovieTickets/filmi.php`
  - `/MovieTickets/ticket.php`
  - `/MovieTickets/contact.php`
- **Nastavitve:**
  - 50 uporabnikov
  - Ramp-up: 10 s
  - 5 ponovitev

---

## 3. Potek testiranja
1. Zagnan lokalni Apache in MySQL prek XAMPP.
2. Preverjeno delovanje aplikacije v brskalniku.
3. V JMetru pripravljen testni načrt s štirimi HTTP zahtevami in listenerji.
4. Izveden test in zbrani rezultati v "Summary Report".

---

## 4. Rezultati testa

| Stran | # Zahtev | Povp. odziv (ms) | Min (ms) | Max (ms) | Napake | Throughput |
|-------|----------:|-----------------:|----------:|----------:|--------:|------------:|
| Home Page | 250 | 13 | 3 | 49 | 0 % | 25.3/s |
| Movie Page | 250 | 0 | 0 | 1 | 0 % | 25.4/s |
| Ticket Page | 250 | 13 | 4 | 46 | 0 % | 25.3/s |
| Kontakt Page | 250 | 6 | 1 | 27 | 0 % | 25.3/s |
| **Skupaj** | **1000** | **8** | **0** | **49** | **0 %** | **100.6/s** |

---

## 5. Analiza
Aplikacija se odziva hitro, brez zaznanih napak. Povprečni odzivni časi so med 0–13 ms, kar kaže na dobro optimizirano aplikacijo in stabilen strežnik. Največji odzivi (do 49 ms) so še vedno znotraj normalnega območja.

---

## 6. Sklep
Sistem MovieTickets izpolnjuje nefunkcionalne zahteve glede **odzivnosti in stabilnosti**. Rezultati kažejo, da aplikacija deluje stabilno in hitro tudi pri 50 sočasnih uporabnikih. Za nadaljnje testiranje bi bilo smiselno preizkusiti večjo obremenitev (npr. 200 uporabnikov) ali test na oddaljenem strežniku.

---

*Poročilo pripravljeno za nalogo 5 – Sistemski test (Performance test).*