##  Testni scenariji

##  Testni scenarij 1: Registracija / Prijava uporabnika
**ID:** signup01  
**Namen:** Preveriti uspešno registracijo in prijavo uporabnika  

**Predpogoji:**
- Uporabnik še ni registriran  
- Aplikacija je dostopna  

**Koraki:**
1. Odpri začetno stran aplikacije  
2. Klikni »Register«  
3. Vnesi zahtevane podatke 
4. Klikni »Register«  
5. Po uspešni registraciji klikni »Login«  
6. Vnesi e-mail in geslo  
7. Klikni »Login«  

**Pričakovani rezultat:**  
- Prikaže se sporočilo o uspešni registraciji  
- Uporabnik je po prijavi preusmerjen na začetno stran z vidnim profilom  

**Rezultat testa:**  Uspešno  

---

### Testni scenarij 2: Nakup vstopnic
**ID:** ticket02  
**Namen:** Preveriti pravilno delovanje nakupa vstopnic  

**Predpogoji:**
- Uporabnik je prijavljen  
- Na voljo so dogodki z vstopnicami  

**Koraki:**
1. Odpri stran z dogodki  
2. Izberi dogodek  
3. Izberi število vstopnic in lokacijo  
4. Vpiši ime filma
5. Nadaljuj na »Confirm Ticket«  

**Pričakovani rezultat:**  
- Sistem prikaže sporočilo »Your ticket is booked«  


**Rezultat testa:**  Uspešno  

---

### Testni scenarij 3: Pošiljanje sporočila
**ID:** mail03  
**Namen:** Preveriti uspešno pošiljanje emaila

**Predpogoji:**
- Aplikacija je dostopna  
- E-poštni sistem deluje pravilno  

**Koraki:**
1. Odpri stran »Contact«  
2. Vnesi ime, e-mail in sporočilo  
3. Klikni "Submit"

**Pričakovani rezultat:**  
- Sistem prikaže sporočilo »We will contact you soon«  


**Rezultat testa:**  Uspešno 
