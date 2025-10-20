
# 📘 Dokumentacija unit testov – MovieTickets

Ta dokument opisuje vse **unit teste**, pripravljene v datoteki `tests/MovieTicketsTest.php`.
Testi so napisani v **PHPUnit** in preverjajo čisto logiko funkcij (brez baze podatkov).

---

## 🔧 Seznam funkcij in njihov namen

| Funkcija | Namen | Vhodni podatki | Pričakovani rezultat |
|-----------|--------|----------------|----------------------|
| **validateEmail($email)** | Preveri, ali ima e-mail pravilen format | niz (string) e-poštnega naslova | `true` za veljaven, `false` za neveljaven |
| **calculateTicketPrice($numTickets, $basePrice)** | Izračuna skupno ceno vstopnic | število vstopnic, osnovna cena | zmnožek obeh ali `false` za negativne vhode |
| **checkSeatAvailability($requested, $available)** | Preveri, ali je dovolj sedežev za rezervacijo | zahtevano in razpoložljivo število sedežev | `true` ali `false` |
| **formatMovieTitle($title)** | Formatira naslov filma | niz (string) naslova filma | naslov s pravilnimi velikimi začetnicami |
| **calculateDiscount($price, $discountPercent)** | Izračuna končno ceno po popustu | cena, odstotek popusta | končna cena ali `false` za napačen vhod |

---

## 🧪 Struktura testov

Za vsako funkcijo so vključeni trije tipi testov:

- ✅ **Pozitivni primer** – pravilni vhod, pričakovan uspešen rezultat  
- ❌ **Negativni primer** – napačen vhod, pričakovan neuspeh ali `false`  
- ⚙️ **Robni primer** – mejne vrednosti vhodov (npr. 0, prazni nizi, 100% popust …)

---

## 🧩 Primeri testov (povzetek)

### 1️⃣ validateEmail()
| Primer | Vhod | Pričakovani rezultat |
|---------|------|----------------------|
| Pozitivni | `user@example.com` | `true` |
| Negativni | `invalid@@example` | `false` |
| Robni | `a@b.co` | `true` |

### 2️⃣ calculateTicketPrice()
| Primer | Vhod | Pričakovani rezultat |
|---------|------|----------------------|
| Pozitivni | `(3, 10)` | `30` |
| Negativni | `(-2, 10)` | `false` |
| Robni | `(0, 15)` | `0` |

### 3️⃣ checkSeatAvailability()
| Primer | Vhod | Pričakovani rezultat |
|---------|------|----------------------|
| Pozitivni | `(3, 10)` | `true` |
| Negativni | `(12, 5)` | `false` |
| Robni | `(5, 5)` | `true` |

### 4️⃣ formatMovieTitle()
| Primer | Vhod | Pričakovani rezultat |
|---------|------|----------------------|
| Pozitivni | `"the matrix"` | `"The Matrix"` |
| Negativni | `""` | `""` |
| Robni | `"up"` | `"Up"` |

### 5️⃣ calculateDiscount()
| Primer | Vhod | Pričakovani rezultat |
|---------|------|----------------------|
| Pozitivni | `(100, 20)` | `80` |
| Negativni | `(100, 150)` | `false` |
| Robni | `(100, 100)` | `0` |

---

## 🚀 Zagon testov

1. Namesti PHPUnit (če še ni nameščen):
   ```bash
   composer require --dev phpunit/phpunit
   ```

2. Zaženi teste:
   ```bash
   vendor/bin/phpunit tests/MovieTicketsTest.php
   ```

3. Če so vsi testi uspešni, boš videl izpis:
   ```
   OK (15 tests, 15 assertions)
   ```

---

📅 *Pripravil: ChatGPT (GPT-5)*  
📁 *Projekt: MovieTickets*  
📄 *Datum: 20. oktober 2025*
