<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeder.
     * 
     * Data from Excel: 359 suppliers
     */
    public function run(): void
    {
        // 1. CV ACHTEK
        $c1 = Company::create(['name' => 'CV ACHTEK', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'CV-ACH-1', 'name' => 'Supplier CV ACHTEK', 'email' => 'cvach1@example.com', 'password' => Hash::make('step-AEK-1'), 'role' => 'supplier', 'company_id' => $c1->id]);

        // 2. PT ACME INTERNATIONAL
        $c2 = Company::create(['name' => 'PT ACME INTERNATIONAL', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-ACM-1', 'name' => 'Supplier PT ACME INTERNATIONAL', 'email' => 'ptacm1@example.com', 'password' => Hash::make('step-AAL-2'), 'role' => 'supplier', 'company_id' => $c2->id]);

        // 3. PT ACTMETAL INDONESIA
        $c3 = Company::create(['name' => 'PT ACTMETAL INDONESIA', 'description' => 'SUBCONT PLATING']);
        User::create(['username' => 'PT-ACT-2', 'name' => 'Supplier PT ACTMETAL INDONESIA', 'email' => 'ptact2@example.com', 'password' => Hash::make('step-AIA-3'), 'role' => 'supplier', 'company_id' => $c3->id]);

        // 4. PT ADI PRATAMA HIKARI
        $c4 = Company::create(['name' => 'PT ADI PRATAMA HIKARI', 'description' => 'SUBCONT PRESS']);
        User::create(['username' => 'PT-ADI-3', 'name' => 'Supplier PT ADI PRATAMA HIKARI', 'email' => 'ptadi3@example.com', 'password' => Hash::make('step-ARI-4'), 'role' => 'supplier', 'company_id' => $c4->id]);

        // 5. PT ADIKARA SATRIA TEKNIK
        $c5 = Company::create(['name' => 'PT ADIKARA SATRIA TEKNIK', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ADI-4', 'name' => 'Supplier PT ADIKARA SATRIA TEKNIK', 'email' => 'ptadi4@example.com', 'password' => Hash::make('step-AIK-5'), 'role' => 'supplier', 'company_id' => $c5->id]);

        // 6. PT ADIPERKASA ANUGGRAH PRATAMA
        $c6 = Company::create(['name' => 'PT ADIPERKASA ANUGGRAH PRATAMA', 'description' => 'DIES']);
        User::create(['username' => 'PT-ADI-5', 'name' => 'Supplier PT ADIPERKASA ANUGGRAH PRATAMA', 'email' => 'ptadi5@example.com', 'password' => Hash::make('step-AMA-6'), 'role' => 'supplier', 'company_id' => $c6->id]);

        // 7. PT ADIPERKASA ANUGRAH PRATAMA
        $c7 = Company::create(['name' => 'PT ADIPERKASA ANUGRAH PRATAMA', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-ADI-6', 'name' => 'Supplier PT ADIPERKASA ANUGRAH PRATAMA', 'email' => 'ptadi6@example.com', 'password' => Hash::make('step-AMA-7'), 'role' => 'supplier', 'company_id' => $c7->id]);

        // 8. PT ADITIYA ENGINEERING
        $c8 = Company::create(['name' => 'PT ADITIYA ENGINEERING', 'description' => 'MACHINE REPAIR, SUPPLY OF SPARE PART']);
        User::create(['username' => 'PT-ADI-7', 'name' => 'Supplier PT ADITIYA ENGINEERING', 'email' => 'ptadi7@example.com', 'password' => Hash::make('step-ANG-8'), 'role' => 'supplier', 'company_id' => $c8->id]);

        // 9. PT ADREENA MULTI SENTOSA
        $c9 = Company::create(['name' => 'PT ADREENA MULTI SENTOSA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ADR-8', 'name' => 'Supplier PT ADREENA MULTI SENTOSA', 'email' => 'ptadr8@example.com', 'password' => Hash::make('step-ASA-9'), 'role' => 'supplier', 'company_id' => $c9->id]);

        // 10. PT ADVANEX PRECISION INDONESIA
        $c10 = Company::create(['name' => 'PT ADVANEX PRECISION INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-ADV-9', 'name' => 'Supplier PT ADVANEX PRECISION INDONESIA', 'email' => 'ptadv9@example.com', 'password' => Hash::make('step-AIA-10'), 'role' => 'supplier', 'company_id' => $c10->id]);

        // 11. PT ADYAWINSA STAMPING INDUSTRIES
        $c11 = Company::create(['name' => 'PT ADYAWINSA STAMPING INDUSTRIES', 'description' => 'CKD']);
        User::create(['username' => 'PT-ADY-10', 'name' => 'Supplier PT ADYAWINSA STAMPING INDUSTRIES', 'email' => 'ptady10@example.com', 'password' => Hash::make('step-AES-11'), 'role' => 'supplier', 'company_id' => $c11->id]);

        // 12. PT AFA TEKNIK SOLUSI
        $c12 = Company::create(['name' => 'PT AFA TEKNIK SOLUSI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-AFA-11', 'name' => 'Supplier PT AFA TEKNIK SOLUSI', 'email' => 'ptafa11@example.com', 'password' => Hash::make('step-ASI-12'), 'role' => 'supplier', 'company_id' => $c12->id]);

        // 13. PT AFTECH RAND PERKASA
        $c13 = Company::create(['name' => 'PT AFTECH RAND PERKASA', 'description' => 'DIES MAKING']);
        User::create(['username' => 'PT-AFT-12', 'name' => 'Supplier PT AFTECH RAND PERKASA', 'email' => 'ptaft12@example.com', 'password' => Hash::make('step-ASA-13'), 'role' => 'supplier', 'company_id' => $c13->id]);

        // 14. PT AGUNG SINAR BUNGKUK
        $c14 = Company::create(['name' => 'PT AGUNG SINAR BUNGKUK', 'description' => 'OUTSOURCHING']);
        User::create(['username' => 'PT-AGU-13', 'name' => 'Supplier PT AGUNG SINAR BUNGKUK', 'email' => 'ptagu13@example.com', 'password' => Hash::make('step-AUK-14'), 'role' => 'supplier', 'company_id' => $c14->id]);

        // 15. PT AIDA INDONESIA
        $c15 = Company::create(['name' => 'PT AIDA INDONESIA', 'description' => 'SPARE PART MESIN AIDA']);
        User::create(['username' => 'PT-AID-14', 'name' => 'Supplier PT AIDA INDONESIA', 'email' => 'ptaid14@example.com', 'password' => Hash::make('step-AIA-15'), 'role' => 'supplier', 'company_id' => $c15->id]);

        // 16. PT AJW SEKAWAN MAKMUR
        $c16 = Company::create(['name' => 'PT AJW SEKAWAN MAKMUR', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-AJW-15', 'name' => 'Supplier PT AJW SEKAWAN MAKMUR', 'email' => 'ptajw15@example.com', 'password' => Hash::make('step-AUR-16'), 'role' => 'supplier', 'company_id' => $c16->id]);

        // 17. PT ALLASA TEKNIK UTAMA
        $c17 = Company::create(['name' => 'PT ALLASA TEKNIK UTAMA', 'description' => 'FABRICATION']);
        User::create(['username' => 'PT-ALL-16', 'name' => 'Supplier PT ALLASA TEKNIK UTAMA', 'email' => 'ptall16@example.com', 'password' => Hash::make('step-AMA-17'), 'role' => 'supplier', 'company_id' => $c17->id]);

        // 18. PT ALTECH MULIA PRATAMA
        $c18 = Company::create(['name' => 'PT ALTECH MULIA PRATAMA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ALT-17', 'name' => 'Supplier PT ALTECH MULIA PRATAMA', 'email' => 'ptalt17@example.com', 'password' => Hash::make('step-AMA-18'), 'role' => 'supplier', 'company_id' => $c18->id]);

        // 19. PT ALTEK MITRA PRESISI
        $c19 = Company::create(['name' => 'PT ALTEK MITRA PRESISI', 'description' => 'DIES']);
        User::create(['username' => 'PT-ALT-18', 'name' => 'Supplier PT ALTEK MITRA PRESISI', 'email' => 'ptalt18@example.com', 'password' => Hash::make('step-ASI-19'), 'role' => 'supplier', 'company_id' => $c19->id]);

        // 20. PT ALVINDO JAYA 3M
        $c20 = Company::create(['name' => 'PT ALVINDO JAYA 3M', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ALV-19', 'name' => 'Supplier PT ALVINDO JAYA 3M', 'email' => 'ptalv19@example.com', 'password' => Hash::make('step-A3M-20'), 'role' => 'supplier', 'company_id' => $c20->id]);

        // 21. PT AMADA ORII SINGAPORE
        $c21 = Company::create(['name' => 'PT AMADA ORII SINGAPORE', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-AMA-20', 'name' => 'Supplier PT AMADA ORII SINGAPORE', 'email' => 'ptama20@example.com', 'password' => Hash::make('step-ARE-21'), 'role' => 'supplier', 'company_id' => $c21->id]);

        // 22. PT AMADA PRESS SYSTEM INDONESIA
        $c22 = Company::create(['name' => 'PT AMADA PRESS SYSTEM INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-AMA-21', 'name' => 'Supplier PT AMADA PRESS SYSTEM INDONESIA', 'email' => 'ptama21@example.com', 'password' => Hash::make('step-AIA-22'), 'role' => 'supplier', 'company_id' => $c22->id]);

        // 23. PT ANDHIKA MITRA TEKNIK
        $c23 = Company::create(['name' => 'PT ANDHIKA MITRA TEKNIK', 'description' => 'GENERAL CONTRACTOR (HOIST,PANEL,MAINTENANCE)']);
        User::create(['username' => 'PT-AND-22', 'name' => 'Supplier PT ANDHIKA MITRA TEKNIK', 'email' => 'ptand22@example.com', 'password' => Hash::make('step-AIK-23'), 'role' => 'supplier', 'company_id' => $c23->id]);

        // 24. PT ANDOU MACHINERY
        $c24 = Company::create(['name' => 'PT ANDOU MACHINERY', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-AND-23', 'name' => 'Supplier PT ANDOU MACHINERY', 'email' => 'ptand23@example.com', 'password' => Hash::make('step-ARY-24'), 'role' => 'supplier', 'company_id' => $c24->id]);

        // 25. PT ANEKA INFOKOM
        $c25 = Company::create(['name' => 'PT ANEKA INFOKOM', 'description' => 'RENTAL & SERVICE PHOTO COPY']);
        User::create(['username' => 'PT-ANE-24', 'name' => 'Supplier PT ANEKA INFOKOM', 'email' => 'ptane24@example.com', 'password' => Hash::make('step-AOM-25'), 'role' => 'supplier', 'company_id' => $c25->id]);

        // 26. CV ANUGERAH SISTEMA PERKASA
        $c26 = Company::create(['name' => 'CV ANUGERAH SISTEMA PERKASA', 'description' => 'DIE']);
        User::create(['username' => 'CV-ANU-2', 'name' => 'Supplier CV ANUGERAH SISTEMA PERKASA', 'email' => 'cvanu2@example.com', 'password' => Hash::make('step-ASA-26'), 'role' => 'supplier', 'company_id' => $c26->id]);

        // 27. PT ARFINDO CIPTA TEKNIK
        $c27 = Company::create(['name' => 'PT ARFINDO CIPTA TEKNIK', 'description' => 'SUBCONT DIES']);
        User::create(['username' => 'PT-ARF-25', 'name' => 'Supplier PT ARFINDO CIPTA TEKNIK', 'email' => 'ptarf25@example.com', 'password' => Hash::make('step-AIK-27'), 'role' => 'supplier', 'company_id' => $c27->id]);

        // 28. PT ARISMA DATA SETIA
        $c28 = Company::create(['name' => 'PT ARISMA DATA SETIA', 'description' => 'TRADING']);
        User::create(['username' => 'PT-ARI-26', 'name' => 'Supplier PT ARISMA DATA SETIA', 'email' => 'ptari26@example.com', 'password' => Hash::make('step-AIA-28'), 'role' => 'supplier', 'company_id' => $c28->id]);

        // 29. PT ARMSTRONG INDUSTRI INDONESIA
        $c29 = Company::create(['name' => 'PT ARMSTRONG INDUSTRI INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-ARM-27', 'name' => 'Supplier PT ARMSTRONG INDUSTRI INDONESIA', 'email' => 'ptarm27@example.com', 'password' => Hash::make('step-AIA-29'), 'role' => 'supplier', 'company_id' => $c29->id]);

        // 30. PT ARTO EQUIPMENT SOLUSINDO
        $c30 = Company::create(['name' => 'PT ARTO EQUIPMENT SOLUSINDO', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ART-28', 'name' => 'Supplier PT ARTO EQUIPMENT SOLUSINDO', 'email' => 'ptart28@example.com', 'password' => Hash::make('step-ADO-30'), 'role' => 'supplier', 'company_id' => $c30->id]);

        // 31. PT ASABA
        $c31 = Company::create(['name' => 'PT ASABA', 'description' => 'RENTAL & SERVICE PHOTO COPY']);
        User::create(['username' => 'PT-ASA-29', 'name' => 'Supplier PT ASABA', 'email' => 'ptasa29@example.com', 'password' => Hash::make('step-ABA-31'), 'role' => 'supplier', 'company_id' => $c31->id]);

        // 32. PT ASAHI TECH SERVICE
        $c32 = Company::create(['name' => 'PT ASAHI TECH SERVICE', 'description' => 'CONSUMABLE PARTS']);
        User::create(['username' => 'PT-ASA-30', 'name' => 'Supplier PT ASAHI TECH SERVICE', 'email' => 'ptasa30@example.com', 'password' => Hash::make('step-ACE-32'), 'role' => 'supplier', 'company_id' => $c32->id]);

        // 33. PT ASKA INTERNATIONAL INDONESIA
        $c33 = Company::create(['name' => 'PT ASKA INTERNATIONAL INDONESIA', 'description' => 'MACHINE REPAIR, SUPPLY OF SPARE PART']);
        User::create(['username' => 'PT-ASK-31', 'name' => 'Supplier PT ASKA INTERNATIONAL INDONESIA', 'email' => 'ptask31@example.com', 'password' => Hash::make('step-AIA-33'), 'role' => 'supplier', 'company_id' => $c33->id]);

        // 34. PT ASNO HORIE INDONESIA
        $c34 = Company::create(['name' => 'PT ASNO HORIE INDONESIA', 'description' => 'SUBCONT PLATING']);
        User::create(['username' => 'PT-ASN-32', 'name' => 'Supplier PT ASNO HORIE INDONESIA', 'email' => 'ptasn32@example.com', 'password' => Hash::make('step-AIA-34'), 'role' => 'supplier', 'company_id' => $c34->id]);

        // 35. PT ASSAB STEELS INDONESIA
        $c35 = Company::create(['name' => 'PT ASSAB STEELS INDONESIA', 'description' => 'CARBON STEEL']);
        User::create(['username' => 'PT-ASS-33', 'name' => 'Supplier PT ASSAB STEELS INDONESIA', 'email' => 'ptass33@example.com', 'password' => Hash::make('step-AIA-35'), 'role' => 'supplier', 'company_id' => $c35->id]);

        // 36. PT ASTA PRIMA TEKNOLOGI
        $c36 = Company::create(['name' => 'PT ASTA PRIMA TEKNOLOGI', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-AST-34', 'name' => 'Supplier PT ASTA PRIMA TEKNOLOGI', 'email' => 'ptast34@example.com', 'password' => Hash::make('step-AGI-36'), 'role' => 'supplier', 'company_id' => $c36->id]);

        // 37. PT ASTHA BINTANG TRANSINDO
        $c37 = Company::create(['name' => 'PT ASTHA BINTANG TRANSINDO', 'description' => 'MOBIL']);
        User::create(['username' => 'PT-AST-35', 'name' => 'Supplier PT ASTHA BINTANG TRANSINDO', 'email' => 'ptast35@example.com', 'password' => Hash::make('step-ADO-37'), 'role' => 'supplier', 'company_id' => $c37->id]);

        // 38. PT ASTRA DAIDO STEEL INDONESIA
        $c38 = Company::create(['name' => 'PT ASTRA DAIDO STEEL INDONESIA', 'description' => 'General Trading']);
        User::create(['username' => 'PT-AST-36', 'name' => 'Supplier PT ASTRA DAIDO STEEL INDONESIA', 'email' => 'ptast36@example.com', 'password' => Hash::make('step-AIA-38'), 'role' => 'supplier', 'company_id' => $c38->id]);

        // 39. PT ASTRA OTOPARTS TBK
        $c39 = Company::create(['name' => 'PT ASTRA OTOPARTS TBK', 'description' => 'PLATE RR, WASHER PLATE, SPACER']);
        User::create(['username' => 'PT-AST-37', 'name' => 'Supplier PT ASTRA OTOPARTS TBK', 'email' => 'ptast37@example.com', 'password' => Hash::make('step-ABK-39'), 'role' => 'supplier', 'company_id' => $c39->id]);

        // 40. CV ASWAN BERSAUDARA
        $c40 = Company::create(['name' => 'CV ASWAN BERSAUDARA', 'description' => 'BESI HOLLO, BESI SIKU, PLAT']);
        User::create(['username' => 'CV-ASW-3', 'name' => 'Supplier CV ASWAN BERSAUDARA', 'email' => 'cvasw3@example.com', 'password' => Hash::make('step-ARA-40'), 'role' => 'supplier', 'company_id' => $c40->id]);

        // 41. PT ATLAS PETROCHEM INDO
        $c41 = Company::create(['name' => 'PT ATLAS PETROCHEM INDO', 'description' => 'DN COAT RL-55, DN ALPHA COOL ES']);
        User::create(['username' => 'PT-ATL-38', 'name' => 'Supplier PT ATLAS PETROCHEM INDO', 'email' => 'ptatl38@example.com', 'password' => Hash::make('step-ADO-41'), 'role' => 'supplier', 'company_id' => $c41->id]);

        // 42. PT AUTOMOTIVE FASTENERS AOYAMA INDONESIA
        $c42 = Company::create(['name' => 'PT AUTOMOTIVE FASTENERS AOYAMA INDONESIA', 'description' => 'BOLT, WELD']);
        User::create(['username' => 'PT-AUT-39', 'name' => 'Supplier PT AUTOMOTIVE FASTENERS AOYAMA INDONESIA', 'email' => 'ptaut39@example.com', 'password' => Hash::make('step-AIA-42'), 'role' => 'supplier', 'company_id' => $c42->id]);

        // 43. PT AUTOTECH PERKASA MANDIRI
        $c43 = Company::create(['name' => 'PT AUTOTECH PERKASA MANDIRI', 'description' => 'SUBCONT MACHINING']);
        User::create(['username' => 'PT-AUT-40', 'name' => 'Supplier PT AUTOTECH PERKASA MANDIRI', 'email' => 'ptaut40@example.com', 'password' => Hash::make('step-ARI-43'), 'role' => 'supplier', 'company_id' => $c43->id]);

        // 44. PT BAHANA MITRA LESTARI
        $c44 = Company::create(['name' => 'PT BAHANA MITRA LESTARI', 'description' => 'OLI MESIN WIRE CUT']);
        User::create(['username' => 'PT-BAH-41', 'name' => 'Supplier PT BAHANA MITRA LESTARI', 'email' => 'ptbah41@example.com', 'password' => Hash::make('step-BRI-44'), 'role' => 'supplier', 'company_id' => $c44->id]);

        // 45. PT BAJA SURYA SAKTI
        $c45 = Company::create(['name' => 'PT BAJA SURYA SAKTI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-BAJ-42', 'name' => 'Supplier PT BAJA SURYA SAKTI', 'email' => 'ptbaj42@example.com', 'password' => Hash::make('step-BTI-45'), 'role' => 'supplier', 'company_id' => $c45->id]);

        // 46. PT BANGUN MULYA ABADI
        $c46 = Company::create(['name' => 'PT BANGUN MULYA ABADI', 'description' => 'RACK KANBAN']);
        User::create(['username' => 'PT-BAN-43', 'name' => 'Supplier PT BANGUN MULYA ABADI', 'email' => 'ptban43@example.com', 'password' => Hash::make('step-BDI-46'), 'role' => 'supplier', 'company_id' => $c46->id]);

        // 47. PT BANSHU RUBBER INDONESIA
        $c47 = Company::create(['name' => 'PT BANSHU RUBBER INDONESIA', 'description' => 'Gasket']);
        User::create(['username' => 'PT-BAN-44', 'name' => 'Supplier PT BANSHU RUBBER INDONESIA', 'email' => 'ptban44@example.com', 'password' => Hash::make('step-BIA-47'), 'role' => 'supplier', 'company_id' => $c47->id]);

        // 48. PT BEKASI POWER
        $c48 = Company::create(['name' => 'PT BEKASI POWER', 'description' => 'LISTRIK']);
        User::create(['username' => 'PT-BEK-45', 'name' => 'Supplier PT BEKASI POWER', 'email' => 'ptbek45@example.com', 'password' => Hash::make('step-BER-48'), 'role' => 'supplier', 'company_id' => $c48->id]);

        // 49. PT BIMA MANUNGGAL UTAMA
        $c49 = Company::create(['name' => 'PT BIMA MANUNGGAL UTAMA', 'description' => 'SUBCONT MACHINING']);
        User::create(['username' => 'PT-BIM-46', 'name' => 'Supplier PT BIMA MANUNGGAL UTAMA', 'email' => 'ptbim46@example.com', 'password' => Hash::make('step-BMA-49'), 'role' => 'supplier', 'company_id' => $c49->id]);

        // 50. PT BINA PRIMA MULTI UTAMA
        $c50 = Company::create(['name' => 'PT BINA PRIMA MULTI UTAMA', 'description' => 'Perusahaan Jasa Keselamatan dan Kesehatan (PJK3) dan Pemeriksaan dan Pengujian (Riksa Uji) K3']);
        User::create(['username' => 'PT-BIN-47', 'name' => 'Supplier PT BINA PRIMA MULTI UTAMA', 'email' => 'ptbin47@example.com', 'password' => Hash::make('step-BMA-50'), 'role' => 'supplier', 'company_id' => $c50->id]);

        // 51. PT BINTANG BARUTAMA
        $c51 = Company::create(['name' => 'PT BINTANG BARUTAMA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-BIN-48', 'name' => 'Supplier PT BINTANG BARUTAMA', 'email' => 'ptbin48@example.com', 'password' => Hash::make('step-BMA-51'), 'role' => 'supplier', 'company_id' => $c51->id]);

        // 52. PT BINTANG ELECTRIC JAYA
        $c52 = Company::create(['name' => 'PT BINTANG ELECTRIC JAYA', 'description' => 'ELECTRICAL SPARE PARTS']);
        User::create(['username' => 'PT-BIN-49', 'name' => 'Supplier PT BINTANG ELECTRIC JAYA', 'email' => 'ptbin49@example.com', 'password' => Hash::make('step-BYA-52'), 'role' => 'supplier', 'company_id' => $c52->id]);

        // 53. PT BINTANG METAL SEJAHTERA
        $c53 = Company::create(['name' => 'PT BINTANG METAL SEJAHTERA', 'description' => 'CONSUMABLE PARTS']);
        User::create(['username' => 'PT-BIN-50', 'name' => 'Supplier PT BINTANG METAL SEJAHTERA', 'email' => 'ptbin50@example.com', 'password' => Hash::make('step-BRA-53'), 'role' => 'supplier', 'company_id' => $c53->id]);

        // 54. PT BOLTZ INDONESIA
        $c54 = Company::create(['name' => 'PT BOLTZ INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-BOL-51', 'name' => 'Supplier PT BOLTZ INDONESIA', 'email' => 'ptbol51@example.com', 'password' => Hash::make('step-BIA-54'), 'role' => 'supplier', 'company_id' => $c54->id]);

        // 55. PT BUANA NITTANINDO GAS
        $c55 = Company::create(['name' => 'PT BUANA NITTANINDO GAS', 'description' => 'ELPIJI EX PERTAMINA']);
        User::create(['username' => 'PT-BUA-52', 'name' => 'Supplier PT BUANA NITTANINDO GAS', 'email' => 'ptbua52@example.com', 'password' => Hash::make('step-BAS-55'), 'role' => 'supplier', 'company_id' => $c55->id]);

        // 56. PT CAHAYATIARA MUSTIKA SCIENTIFIC
        $c56 = Company::create(['name' => 'PT CAHAYATIARA MUSTIKA SCIENTIFIC', 'description' => 'SODIUM HYDROXIDE PELLETS GR']);
        User::create(['username' => 'PT-CAH-53', 'name' => 'Supplier PT CAHAYATIARA MUSTIKA SCIENTIFIC', 'email' => 'ptcah53@example.com', 'password' => Hash::make('step-CIC-56'), 'role' => 'supplier', 'company_id' => $c56->id]);

        // 57. PT CAHAYATIARA MUSTIKA SCIENTIFIC INDONESIA
        $c57 = Company::create(['name' => 'PT CAHAYATIARA MUSTIKA SCIENTIFIC INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-CAH-54', 'name' => 'Supplier PT CAHAYATIARA MUSTIKA SCIENTIFIC INDONESIA', 'email' => 'ptcah54@example.com', 'password' => Hash::make('step-CIA-57'), 'role' => 'supplier', 'company_id' => $c57->id]);

        // 58. CV Cakra Buana
        $c58 = Company::create(['name' => 'CV Cakra Buana', 'description' => 'PERCETAKAN']);
        User::create(['username' => 'CV-Cak-4', 'name' => 'Supplier CV Cakra Buana', 'email' => 'cvcak4@example.com', 'password' => Hash::make('step-Cna-58'), 'role' => 'supplier', 'company_id' => $c58->id]);

        // 59. PT CALTESYS INDONESIA
        $c59 = Company::create(['name' => 'PT CALTESYS INDONESIA', 'description' => 'ALAT KALIBRASI']);
        User::create(['username' => 'PT-CAL-55', 'name' => 'Supplier PT CALTESYS INDONESIA', 'email' => 'ptcal55@example.com', 'password' => Hash::make('step-CIA-59'), 'role' => 'supplier', 'company_id' => $c59->id]);

        // 60. PT CHIYODA KOGYO INDONESIA
        $c60 = Company::create(['name' => 'PT CHIYODA KOGYO INDONESIA', 'description' => 'HARDENING PROCESS']);
        User::create(['username' => 'PT-CHI-56', 'name' => 'Supplier PT CHIYODA KOGYO INDONESIA', 'email' => 'ptchi56@example.com', 'password' => Hash::make('step-CIA-60'), 'role' => 'supplier', 'company_id' => $c60->id]);

        // 61. CV CIPTA KARYA
        $c61 = Company::create(['name' => 'CV CIPTA KARYA', 'description' => 'STATIONARY']);
        User::create(['username' => 'CV-CIP-5', 'name' => 'Supplier CV CIPTA KARYA', 'email' => 'cvcip5@example.com', 'password' => Hash::make('step-CYA-61'), 'role' => 'supplier', 'company_id' => $c61->id]);

        // 62. CV CIPTA KARYA AGUNG
        $c62 = Company::create(['name' => 'CV CIPTA KARYA AGUNG', 'description' => 'MANUFACTURING']);
        User::create(['username' => 'CV-CIP-6', 'name' => 'Supplier CV CIPTA KARYA AGUNG', 'email' => 'cvcip6@example.com', 'password' => Hash::make('step-CNG-62'), 'role' => 'supplier', 'company_id' => $c62->id]);

        // 63. PT CITRA HELDSINDO
        $c63 = Company::create(['name' => 'PT CITRA HELDSINDO', 'description' => 'OUTSOURCHING']);
        User::create(['username' => 'PT-CIT-57', 'name' => 'Supplier PT CITRA HELDSINDO', 'email' => 'ptcit57@example.com', 'password' => Hash::make('step-CDO-63'), 'role' => 'supplier', 'company_id' => $c63->id]);

        // 64. PT CITRA LANGGENG SENTOSA
        $c64 = Company::create(['name' => 'PT CITRA LANGGENG SENTOSA', 'description' => 'PIPA JOINT RACK STORAGE']);
        User::create(['username' => 'PT-CIT-58', 'name' => 'Supplier PT CITRA LANGGENG SENTOSA', 'email' => 'ptcit58@example.com', 'password' => Hash::make('step-CSA-64'), 'role' => 'supplier', 'company_id' => $c64->id]);

        // 65. PT CITRAMAS ALFASEJAHTERA
        $c65 = Company::create(['name' => 'PT CITRAMAS ALFASEJAHTERA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-CIT-59', 'name' => 'Supplier PT CITRAMAS ALFASEJAHTERA', 'email' => 'ptcit59@example.com', 'password' => Hash::make('step-CRA-65'), 'role' => 'supplier', 'company_id' => $c65->id]);

        // 66. CV CITRATECH
        $c66 = Company::create(['name' => 'CV CITRATECH', 'description' => 'TRADING ( JASA )']);
        User::create(['username' => 'CV-CIT-7', 'name' => 'Supplier CV CITRATECH', 'email' => 'cvcit7@example.com', 'password' => Hash::make('step-CCH-66'), 'role' => 'supplier', 'company_id' => $c66->id]);

        // 67. CV CONTINENTAL SPRING PRODUCT
        $c67 = Company::create(['name' => 'CV CONTINENTAL SPRING PRODUCT', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'CV-CON-8', 'name' => 'Supplier CV CONTINENTAL SPRING PRODUCT', 'email' => 'cvcon8@example.com', 'password' => Hash::make('step-CCT-67'), 'role' => 'supplier', 'company_id' => $c67->id]);

        // 68. PT DAE BAEK
        $c68 = Company::create(['name' => 'PT DAE BAEK', 'description' => 'SUBCONT']);
        User::create(['username' => 'PT-DAE-60', 'name' => 'Supplier PT DAE BAEK', 'email' => 'ptdae60@example.com', 'password' => Hash::make('step-DEK-68'), 'role' => 'supplier', 'company_id' => $c68->id]);

        // 69. PT DAEBAEK
        $c69 = Company::create(['name' => 'PT DAEBAEK', 'description' => 'SUBCONT PRESS']);
        User::create(['username' => 'PT-DAE-61', 'name' => 'Supplier PT DAEBAEK', 'email' => 'ptdae61@example.com', 'password' => Hash::make('step-DEK-69'), 'role' => 'supplier', 'company_id' => $c69->id]);

        // 70. PT DAKARA CITRA TANGGUH
        $c70 = Company::create(['name' => 'PT DAKARA CITRA TANGGUH', 'description' => 'APD']);
        User::create(['username' => 'PT-DAK-62', 'name' => 'Supplier PT DAKARA CITRA TANGGUH', 'email' => 'ptdak62@example.com', 'password' => Hash::make('step-DUH-70'), 'role' => 'supplier', 'company_id' => $c70->id]);

        // 71. PT DAMAR MACHINERY
        $c71 = Company::create(['name' => 'PT DAMAR MACHINERY', 'description' => 'ENGINEERING']);
        User::create(['username' => 'PT-DAM-63', 'name' => 'Supplier PT DAMAR MACHINERY', 'email' => 'ptdam63@example.com', 'password' => Hash::make('step-DRY-71'), 'role' => 'supplier', 'company_id' => $c71->id]);

        // 72. PT DELA CEMARA INDAH
        $c72 = Company::create(['name' => 'PT DELA CEMARA INDAH', 'description' => 'CKD']);
        User::create(['username' => 'PT-DEL-64', 'name' => 'Supplier PT DELA CEMARA INDAH', 'email' => 'ptdel64@example.com', 'password' => Hash::make('step-DAH-72'), 'role' => 'supplier', 'company_id' => $c72->id]);

        // 73. PT DELIJAYA GLOBAL
        $c73 = Company::create(['name' => 'PT DELIJAYA GLOBAL', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-DEL-65', 'name' => 'Supplier PT DELIJAYA GLOBAL', 'email' => 'ptdel65@example.com', 'password' => Hash::make('step-DAL-73'), 'role' => 'supplier', 'company_id' => $c73->id]);

        // 74. PT DELTA ANUGRAH
        $c74 = Company::create(['name' => 'PT DELTA ANUGRAH', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-DEL-66', 'name' => 'Supplier PT DELTA ANUGRAH', 'email' => 'ptdel66@example.com', 'password' => Hash::make('step-DAH-74'), 'role' => 'supplier', 'company_id' => $c74->id]);

        // 75. PT DELTA SOLUSI INDO
        $c75 = Company::create(['name' => 'PT DELTA SOLUSI INDO', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-DEL-67', 'name' => 'Supplier PT DELTA SOLUSI INDO', 'email' => 'ptdel67@example.com', 'password' => Hash::make('step-DDO-75'), 'role' => 'supplier', 'company_id' => $c75->id]);

        // 76. PT DENKO WAHANA SAKTI
        $c76 = Company::create(['name' => 'PT DENKO WAHANA SAKTI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-DEN-68', 'name' => 'Supplier PT DENKO WAHANA SAKTI', 'email' => 'ptden68@example.com', 'password' => Hash::make('step-DTI-76'), 'role' => 'supplier', 'company_id' => $c76->id]);

        // 77. PT DEWANTRA KARSA GEMILANG
        $c77 = Company::create(['name' => 'PT DEWANTRA KARSA GEMILANG', 'description' => 'TRADING (COMPRESSOR)']);
        User::create(['username' => 'PT-DEW-69', 'name' => 'Supplier PT DEWANTRA KARSA GEMILANG', 'email' => 'ptdew69@example.com', 'password' => Hash::make('step-DNG-77'), 'role' => 'supplier', 'company_id' => $c77->id]);

        // 78. PT DHARMA POLIMETAL
        $c78 = Company::create(['name' => 'PT DHARMA POLIMETAL', 'description' => 'CKD']);
        User::create(['username' => 'PT-DHA-70', 'name' => 'Supplier PT DHARMA POLIMETAL', 'email' => 'ptdha70@example.com', 'password' => Hash::make('step-DAL-78'), 'role' => 'supplier', 'company_id' => $c78->id]);

        // 79. PT DIGIGUNA PRESISI
        $c79 = Company::create(['name' => 'PT DIGIGUNA PRESISI', 'description' => 'WEIGHTING EQUIPMENT MEASUREMENT INSTRUMENT']);
        User::create(['username' => 'PT-DIG-71', 'name' => 'Supplier PT DIGIGUNA PRESISI', 'email' => 'ptdig71@example.com', 'password' => Hash::make('step-DSI-79'), 'role' => 'supplier', 'company_id' => $c79->id]);

        // 80. PT DIPSOL INDONESIA
        $c80 = Company::create(['name' => 'PT DIPSOL INDONESIA', 'description' => 'SUBCONT PLATING']);
        User::create(['username' => 'PT-DIP-72', 'name' => 'Supplier PT DIPSOL INDONESIA', 'email' => 'ptdip72@example.com', 'password' => Hash::make('step-DIA-80'), 'role' => 'supplier', 'company_id' => $c80->id]);

        // 81. PT DIRGAMENARA NUSADWIPA
        $c81 = Company::create(['name' => 'PT DIRGAMENARA NUSADWIPA', 'description' => 'CARBON STEEL']);
        User::create(['username' => 'PT-DIR-73', 'name' => 'Supplier PT DIRGAMENARA NUSADWIPA', 'email' => 'ptdir73@example.com', 'password' => Hash::make('step-DPA-81'), 'role' => 'supplier', 'company_id' => $c81->id]);

        // 82. PT DONG SUNG TOOLS
        $c82 = Company::create(['name' => 'PT DONG SUNG TOOLS', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-DON-74', 'name' => 'Supplier PT DONG SUNG TOOLS', 'email' => 'ptdon74@example.com', 'password' => Hash::make('step-DLS-82'), 'role' => 'supplier', 'company_id' => $c82->id]);

        // 83. CV DUA SEJAHTERA
        $c83 = Company::create(['name' => 'CV DUA SEJAHTERA', 'description' => 'SPANDUK, BANNER']);
        User::create(['username' => 'CV-DUA-9', 'name' => 'Supplier CV DUA SEJAHTERA', 'email' => 'cvdua9@example.com', 'password' => Hash::make('step-DRA-83'), 'role' => 'supplier', 'company_id' => $c83->id]);

        // 84. PT DUAKA SEKAWAN SENTRAMUKTI
        $c84 = Company::create(['name' => 'PT DUAKA SEKAWAN SENTRAMUKTI', 'description' => 'EPOXY FINISH GREEN & CREAM']);
        User::create(['username' => 'PT-DUA-75', 'name' => 'Supplier PT DUAKA SEKAWAN SENTRAMUKTI', 'email' => 'ptdua75@example.com', 'password' => Hash::make('step-DTI-84'), 'role' => 'supplier', 'company_id' => $c84->id]);

        // 85. PT DUNIA KATIGA
        $c85 = Company::create(['name' => 'PT DUNIA KATIGA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-DUN-76', 'name' => 'Supplier PT DUNIA KATIGA', 'email' => 'ptdun76@example.com', 'password' => Hash::make('step-DGA-85'), 'role' => 'supplier', 'company_id' => $c85->id]);

        // 86. PT DUTA LISTRIK NIAGA
        $c86 = Company::create(['name' => 'PT DUTA LISTRIK NIAGA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-DUT-77', 'name' => 'Supplier PT DUTA LISTRIK NIAGA', 'email' => 'ptdut77@example.com', 'password' => Hash::make('step-DGA-86'), 'role' => 'supplier', 'company_id' => $c86->id]);

        // 87. PT ECM INTEGRATOR INDONESIA
        $c87 = Company::create(['name' => 'PT ECM INTEGRATOR INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ECM-78', 'name' => 'Supplier PT ECM INTEGRATOR INDONESIA', 'email' => 'ptecm78@example.com', 'password' => Hash::make('step-EIA-87'), 'role' => 'supplier', 'company_id' => $c87->id]);

        // 88. PT ECOTEK
        $c88 = Company::create(['name' => 'PT ECOTEK', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ECO-79', 'name' => 'Supplier PT ECOTEK', 'email' => 'pteco79@example.com', 'password' => Hash::make('step-EEK-88'), 'role' => 'supplier', 'company_id' => $c88->id]);

        // 89. PT EDHER PERKASA MANDIRI
        $c89 = Company::create(['name' => 'PT EDHER PERKASA MANDIRI', 'description' => 'SUBCONT']);
        User::create(['username' => 'PT-EDH-80', 'name' => 'Supplier PT EDHER PERKASA MANDIRI', 'email' => 'ptedh80@example.com', 'password' => Hash::make('step-ERI-89'), 'role' => 'supplier', 'company_id' => $c89->id]);

        // 90. PT Edher Perkasa Mandiri (EPM)
        $c90 = Company::create(['name' => 'PT Edher Perkasa Mandiri (EPM)', 'description' => 'SUBCONT HOSECLAMP']);
        User::create(['username' => 'PT-Edh-81', 'name' => 'Supplier PT Edher Perkasa Mandiri (EPM)', 'email' => 'ptedh81@example.com', 'password' => Hash::make('step-EM)-90'), 'role' => 'supplier', 'company_id' => $c90->id]);

        // 91. PT EDMAR TEKNOLOGI INDONESIA
        $c91 = Company::create(['name' => 'PT EDMAR TEKNOLOGI INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-EDM-82', 'name' => 'Supplier PT EDMAR TEKNOLOGI INDONESIA', 'email' => 'ptedm82@example.com', 'password' => Hash::make('step-EIA-91'), 'role' => 'supplier', 'company_id' => $c91->id]);

        // 92. PT ELANG KREASI BERSAMA
        $c92 = Company::create(['name' => 'PT ELANG KREASI BERSAMA', 'description' => 'SUBCONT DIES']);
        User::create(['username' => 'PT-ELA-83', 'name' => 'Supplier PT ELANG KREASI BERSAMA', 'email' => 'ptela83@example.com', 'password' => Hash::make('step-EMA-92'), 'role' => 'supplier', 'company_id' => $c92->id]);

        // 93. PT ELEKTROPLATING SUPERINDO
        $c93 = Company::create(['name' => 'PT ELEKTROPLATING SUPERINDO', 'description' => 'SUBCONT PLATING']);
        User::create(['username' => 'PT-ELE-84', 'name' => 'Supplier PT ELEKTROPLATING SUPERINDO', 'email' => 'ptele84@example.com', 'password' => Hash::make('step-EDO-93'), 'role' => 'supplier', 'company_id' => $c93->id]);

        // 94. PT ELMECON MULTIKENCANA
        $c94 = Company::create(['name' => 'PT ELMECON MULTIKENCANA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ELM-85', 'name' => 'Supplier PT ELMECON MULTIKENCANA', 'email' => 'ptelm85@example.com', 'password' => Hash::make('step-ENA-94'), 'role' => 'supplier', 'company_id' => $c94->id]);

        // 95. PT ENOCCO VITALTECHNO INDONESIA
        $c95 = Company::create(['name' => 'PT ENOCCO VITALTECHNO INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ENO-86', 'name' => 'Supplier PT ENOCCO VITALTECHNO INDONESIA', 'email' => 'pteno86@example.com', 'password' => Hash::make('step-EIA-95'), 'role' => 'supplier', 'company_id' => $c95->id]);

        // 96. PT ESSANTO JAYA TEKINDO
        $c96 = Company::create(['name' => 'PT ESSANTO JAYA TEKINDO', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ESS-87', 'name' => 'Supplier PT ESSANTO JAYA TEKINDO', 'email' => 'ptess87@example.com', 'password' => Hash::make('step-EDO-96'), 'role' => 'supplier', 'company_id' => $c96->id]);

        // 97. PT Eterna Karya Sejahtera
        $c97 = Company::create(['name' => 'PT Eterna Karya Sejahtera', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-Ete-88', 'name' => 'Supplier PT Eterna Karya Sejahtera', 'email' => 'ptete88@example.com', 'password' => Hash::make('step-Ea -97'), 'role' => 'supplier', 'company_id' => $c97->id]);

        // 98. PT FANUC INDONESIA
        $c98 = Company::create(['name' => 'PT FANUC INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-FAN-89', 'name' => 'Supplier PT FANUC INDONESIA', 'email' => 'ptfan89@example.com', 'password' => Hash::make('step-FIA-98'), 'role' => 'supplier', 'company_id' => $c98->id]);

        // 99. PT FCTEC FASTENER INDONESIA
        $c99 = Company::create(['name' => 'PT FCTEC FASTENER INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-FCT-90', 'name' => 'Supplier PT FCTEC FASTENER INDONESIA', 'email' => 'ptfct90@example.com', 'password' => Hash::make('step-FIA-99'), 'role' => 'supplier', 'company_id' => $c99->id]);

        // 100. PT FUJI INDO SURYA
        $c100 = Company::create(['name' => 'PT FUJI INDO SURYA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-FUJ-91', 'name' => 'Supplier PT FUJI INDO SURYA', 'email' => 'ptfuj91@example.com', 'password' => Hash::make('step-FYA-100'), 'role' => 'supplier', 'company_id' => $c100->id]);

        // 101. PT Fuji Seat Indonesia
        $c101 = Company::create(['name' => 'PT Fuji Seat Indonesia', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-Fuj-92', 'name' => 'Supplier PT Fuji Seat Indonesia', 'email' => 'ptfuj92@example.com', 'password' => Hash::make('step-Fia-101'), 'role' => 'supplier', 'company_id' => $c101->id]);

        // 102. PT FUJI SEIMITSU INDONESIA
        $c102 = Company::create(['name' => 'PT FUJI SEIMITSU INDONESIA', 'description' => 'CKD']);
        User::create(['username' => 'PT-FUJ-93', 'name' => 'Supplier PT FUJI SEIMITSU INDONESIA', 'email' => 'ptfuj93@example.com', 'password' => Hash::make('step-FIA-102'), 'role' => 'supplier', 'company_id' => $c102->id]);

        // 103. PT FUJIMAKI STEEL INDONESIA
        $c103 = Company::create(['name' => 'PT FUJIMAKI STEEL INDONESIA', 'description' => 'RAW MATERIAL DIES']);
        User::create(['username' => 'PT-FUJ-94', 'name' => 'Supplier PT FUJIMAKI STEEL INDONESIA', 'email' => 'ptfuj94@example.com', 'password' => Hash::make('step-FIA-103'), 'role' => 'supplier', 'company_id' => $c103->id]);

        // 104. PT FUKOKU TOKAI RUBBER INDONESIA
        $c104 = Company::create(['name' => 'PT FUKOKU TOKAI RUBBER INDONESIA', 'description' => 'CKD']);
        User::create(['username' => 'PT-FUK-95', 'name' => 'Supplier PT FUKOKU TOKAI RUBBER INDONESIA', 'email' => 'ptfuk95@example.com', 'password' => Hash::make('step-FIA-104'), 'role' => 'supplier', 'company_id' => $c104->id]);

        // 105. PT GADING MITRA TEKNIK
        $c105 = Company::create(['name' => 'PT GADING MITRA TEKNIK', 'description' => 'TRADING']);
        User::create(['username' => 'PT-GAD-96', 'name' => 'Supplier PT GADING MITRA TEKNIK', 'email' => 'ptgad96@example.com', 'password' => Hash::make('step-GIK-105'), 'role' => 'supplier', 'company_id' => $c105->id]);

        // 106. PT GADING NUSA PERSADA
        $c106 = Company::create(['name' => 'PT GADING NUSA PERSADA', 'description' => 'TOOLS & TECHNICAL EQUIPMENTS']);
        User::create(['username' => 'PT-GAD-97', 'name' => 'Supplier PT GADING NUSA PERSADA', 'email' => 'ptgad97@example.com', 'password' => Hash::make('step-GDA-106'), 'role' => 'supplier', 'company_id' => $c106->id]);

        // 107. PT GAPURAMAS SEJAHTERA
        $c107 = Company::create(['name' => 'PT GAPURAMAS SEJAHTERA', 'description' => 'OIL ESSO / TERESSO']);
        User::create(['username' => 'PT-GAP-98', 'name' => 'Supplier PT GAPURAMAS SEJAHTERA', 'email' => 'ptgap98@example.com', 'password' => Hash::make('step-GRA-107'), 'role' => 'supplier', 'company_id' => $c107->id]);

        // 108. PT GARUDA METAL UTAMA
        $c108 = Company::create(['name' => 'PT GARUDA METAL UTAMA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-GAR-99', 'name' => 'Supplier PT GARUDA METAL UTAMA', 'email' => 'ptgar99@example.com', 'password' => Hash::make('step-GMA-108'), 'role' => 'supplier', 'company_id' => $c108->id]);

        // 109. PT GARUDA METALINDO
        $c109 = Company::create(['name' => 'PT GARUDA METALINDO', 'description' => 'CKD & SUBCONT']);
        User::create(['username' => 'PT-GAR-100', 'name' => 'Supplier PT GARUDA METALINDO', 'email' => 'ptgar100@example.com', 'password' => Hash::make('step-GDO-109'), 'role' => 'supplier', 'company_id' => $c109->id]);

        // 110. PT GARUDA METALINDO TBK.
        $c110 = Company::create(['name' => 'PT GARUDA METALINDO TBK.', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-GAR-101', 'name' => 'Supplier PT GARUDA METALINDO TBK.', 'email' => 'ptgar101@example.com', 'password' => Hash::make('step-GK.-110'), 'role' => 'supplier', 'company_id' => $c110->id]);

        // 111. PT GEMA SYIFA PRATAMA
        $c111 = Company::create(['name' => 'PT GEMA SYIFA PRATAMA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-GEM-102', 'name' => 'Supplier PT GEMA SYIFA PRATAMA', 'email' => 'ptgem102@example.com', 'password' => Hash::make('step-GMA-111'), 'role' => 'supplier', 'company_id' => $c111->id]);

        // 112. PT GEMA TOOLS PRECISIOM
        $c112 = Company::create(['name' => 'PT GEMA TOOLS PRECISIOM', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-GEM-103', 'name' => 'Supplier PT GEMA TOOLS PRECISIOM', 'email' => 'ptgem103@example.com', 'password' => Hash::make('step-GOM-112'), 'role' => 'supplier', 'company_id' => $c112->id]);

        // 113. PT GEMILANG INDO WIRATAMA
        $c113 = Company::create(['name' => 'PT GEMILANG INDO WIRATAMA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-GEM-104', 'name' => 'Supplier PT GEMILANG INDO WIRATAMA', 'email' => 'ptgem104@example.com', 'password' => Hash::make('step-GMA-113'), 'role' => 'supplier', 'company_id' => $c113->id]);

        // 114. PT GEMILANG SUKSES GARMINDO
        $c114 = Company::create(['name' => 'PT GEMILANG SUKSES GARMINDO', 'description' => 'MANUFACTURING']);
        User::create(['username' => 'PT-GEM-105', 'name' => 'Supplier PT GEMILANG SUKSES GARMINDO', 'email' => 'ptgem105@example.com', 'password' => Hash::make('step-GDO-114'), 'role' => 'supplier', 'company_id' => $c114->id]);

        // 115. PT GLOBAL MULTIPARTS
        $c115 = Company::create(['name' => 'PT GLOBAL MULTIPARTS', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-GLO-106', 'name' => 'Supplier PT GLOBAL MULTIPARTS', 'email' => 'ptglo106@example.com', 'password' => Hash::make('step-GS -115'), 'role' => 'supplier', 'company_id' => $c115->id]);

        // 116. PT GOGI PRINT
        $c116 = Company::create(['name' => 'PT GOGI PRINT', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-GOG-107', 'name' => 'Supplier PT GOGI PRINT', 'email' => 'ptgog107@example.com', 'password' => Hash::make('step-GNT-116'), 'role' => 'supplier', 'company_id' => $c116->id]);

        // 117. PT GOKO SPRING INDONESIA
        $c117 = Company::create(['name' => 'PT GOKO SPRING INDONESIA', 'description' => 'CKD']);
        User::create(['username' => 'PT-GOK-108', 'name' => 'Supplier PT GOKO SPRING INDONESIA', 'email' => 'ptgok108@example.com', 'password' => Hash::make('step-GIA-117'), 'role' => 'supplier', 'company_id' => $c117->id]);

        // 118. PT GONDANG BUMI LESTARI
        $c118 = Company::create(['name' => 'PT GONDANG BUMI LESTARI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-GON-109', 'name' => 'Supplier PT GONDANG BUMI LESTARI', 'email' => 'ptgon109@example.com', 'password' => Hash::make('step-GRI-118'), 'role' => 'supplier', 'company_id' => $c118->id]);

        // 119. PT G-TEKT INDONESIA MANUFACTURING
        $c119 = Company::create(['name' => 'PT G-TEKT INDONESIA MANUFACTURING', 'description' => 'RAW MATERIAL PROD.']);
        User::create(['username' => 'PT-G-T-110', 'name' => 'Supplier PT G-TEKT INDONESIA MANUFACTURING', 'email' => 'ptgt110@example.com', 'password' => Hash::make('step-GNG-119'), 'role' => 'supplier', 'company_id' => $c119->id]);

        // 120. PT G-TEKT  INDONESIA  MANUFACTURING
        $c120 = Company::create(['name' => 'PT G-TEKT  INDONESIA  MANUFACTURING', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-G-T-111', 'name' => 'Supplier PT G-TEKT  INDONESIA  MANUFACTURING', 'email' => 'ptgt111@example.com', 'password' => Hash::make('step-GNG-120'), 'role' => 'supplier', 'company_id' => $c120->id]);

        // 121. PT HANAZA AUTOMATION INDONESIA
        $c121 = Company::create(['name' => 'PT HANAZA AUTOMATION INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-HAN-112', 'name' => 'Supplier PT HANAZA AUTOMATION INDONESIA', 'email' => 'pthan112@example.com', 'password' => Hash::make('step-HIA-121'), 'role' => 'supplier', 'company_id' => $c121->id]);

        // 122. PT HANWA
        $c122 = Company::create(['name' => 'PT HANWA', 'description' => 'STEEL COIL, SHEET TRADING']);
        User::create(['username' => 'PT-HAN-113', 'name' => 'Supplier PT HANWA', 'email' => 'pthan113@example.com', 'password' => Hash::make('step-HWA-122'), 'role' => 'supplier', 'company_id' => $c122->id]);

        // 123. PT HANWA STEEL SERVICE INDONESIA
        $c123 = Company::create(['name' => 'PT HANWA STEEL SERVICE INDONESIA', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-HAN-114', 'name' => 'Supplier PT HANWA STEEL SERVICE INDONESIA', 'email' => 'pthan114@example.com', 'password' => Hash::make('step-HIA-123'), 'role' => 'supplier', 'company_id' => $c123->id]);

        // 124. PT HARAITO MAJU MAPAN
        $c124 = Company::create(['name' => 'PT HARAITO MAJU MAPAN', 'description' => 'SUBCONT DIES']);
        User::create(['username' => 'PT-HAR-115', 'name' => 'Supplier PT HARAITO MAJU MAPAN', 'email' => 'pthar115@example.com', 'password' => Hash::make('step-HAN-124'), 'role' => 'supplier', 'company_id' => $c124->id]);

        // 125. PT HI-LEX PARTS INDONESIA
        $c125 = Company::create(['name' => 'PT HI-LEX PARTS INDONESIA', 'description' => 'PIN VERTIKAL, PIN']);
        User::create(['username' => 'PT-HI--116', 'name' => 'Supplier PT HI-LEX PARTS INDONESIA', 'email' => 'pthi116@example.com', 'password' => Hash::make('step-HIA-125'), 'role' => 'supplier', 'company_id' => $c125->id]);

        // 126. PT HIROMINDO PERKASA
        $c126 = Company::create(['name' => 'PT HIROMINDO PERKASA', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-HIR-117', 'name' => 'Supplier PT HIROMINDO PERKASA', 'email' => 'pthir117@example.com', 'password' => Hash::make('step-HSA-126'), 'role' => 'supplier', 'company_id' => $c126->id]);

        // 127. PT HONDA TRADING INDONESIA
        $c127 = Company::create(['name' => 'PT HONDA TRADING INDONESIA', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-HON-118', 'name' => 'Supplier PT HONDA TRADING INDONESIA', 'email' => 'pthon118@example.com', 'password' => Hash::make('step-HIA-127'), 'role' => 'supplier', 'company_id' => $c127->id]);

        // 128. PT HRC PRIMA SEJAHTERA
        $c128 = Company::create(['name' => 'PT HRC PRIMA SEJAHTERA', 'description' => 'MOBIL']);
        User::create(['username' => 'PT-HRC-119', 'name' => 'Supplier PT HRC PRIMA SEJAHTERA', 'email' => 'pthrc119@example.com', 'password' => Hash::make('step-HRA-128'), 'role' => 'supplier', 'company_id' => $c128->id]);

        // 129. PT IMC TEKNO INDONESIA
        $c129 = Company::create(['name' => 'PT IMC TEKNO INDONESIA', 'description' => 'CKD']);
        User::create(['username' => 'PT-IMC-120', 'name' => 'Supplier PT IMC TEKNO INDONESIA', 'email' => 'ptimc120@example.com', 'password' => Hash::make('step-IIA-129'), 'role' => 'supplier', 'company_id' => $c129->id]);

        // 130. PT INAKA KORPORINDO
        $c130 = Company::create(['name' => 'PT INAKA KORPORINDO', 'description' => 'TRADING MANUFACTURING (PLASTIK , ATK)']);
        User::create(['username' => 'PT-INA-121', 'name' => 'Supplier PT INAKA KORPORINDO', 'email' => 'ptina121@example.com', 'password' => Hash::make('step-IDO-130'), 'role' => 'supplier', 'company_id' => $c130->id]);

        // 131. PT INDOCIPTA HASTA PERKASA
        $c131 = Company::create(['name' => 'PT INDOCIPTA HASTA PERKASA', 'description' => 'SUBCONT PLATING']);
        User::create(['username' => 'PT-IND-122', 'name' => 'Supplier PT INDOCIPTA HASTA PERKASA', 'email' => 'ptind122@example.com', 'password' => Hash::make('step-ISA-131'), 'role' => 'supplier', 'company_id' => $c131->id]);

        // 132. PT INDOKIDA PLATING
        $c132 = Company::create(['name' => 'PT INDOKIDA PLATING', 'description' => 'SUBCOUNT PLATING']);
        User::create(['username' => 'PT-IND-123', 'name' => 'Supplier PT INDOKIDA PLATING', 'email' => 'ptind123@example.com', 'password' => Hash::make('step-ING-132'), 'role' => 'supplier', 'company_id' => $c132->id]);

        // 133. PT INDONESIA NIPPON STEEL PIPE
        $c133 = Company::create(['name' => 'PT INDONESIA NIPPON STEEL PIPE', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-IND-124', 'name' => 'Supplier PT INDONESIA NIPPON STEEL PIPE', 'email' => 'ptind124@example.com', 'password' => Hash::make('step-IPE-133'), 'role' => 'supplier', 'company_id' => $c133->id]);

        // 134. PT INDONESIA STEEL TUBE WORKS, LTD
        $c134 = Company::create(['name' => 'PT INDONESIA STEEL TUBE WORKS, LTD', 'description' => 'MECHANICAL HOT STKM 13AH']);
        User::create(['username' => 'PT-IND-125', 'name' => 'Supplier PT INDONESIA STEEL TUBE WORKS, LTD', 'email' => 'ptind125@example.com', 'password' => Hash::make('step-ITD-134'), 'role' => 'supplier', 'company_id' => $c134->id]);

        // 135. PT INTEGRA SOLUSINDO UTAMA
        $c135 = Company::create(['name' => 'PT INTEGRA SOLUSINDO UTAMA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-INT-126', 'name' => 'Supplier PT INTEGRA SOLUSINDO UTAMA', 'email' => 'ptint126@example.com', 'password' => Hash::make('step-IMA-135'), 'role' => 'supplier', 'company_id' => $c135->id]);

        // 136. PT IRC INOAC INDONESIA
        $c136 = Company::create(['name' => 'PT IRC INOAC INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-IRC-127', 'name' => 'Supplier PT IRC INOAC INDONESIA', 'email' => 'ptirc127@example.com', 'password' => Hash::make('step-IIA-136'), 'role' => 'supplier', 'company_id' => $c136->id]);

        // 137. PT IRON WIRE WORK INDONESIA
        $c137 = Company::create(['name' => 'PT IRON WIRE WORK INDONESIA', 'description' => 'CKD']);
        User::create(['username' => 'PT-IRO-128', 'name' => 'Supplier PT IRON WIRE WORK INDONESIA', 'email' => 'ptiro128@example.com', 'password' => Hash::make('step-IIA-137'), 'role' => 'supplier', 'company_id' => $c137->id]);

        // 138. PT IRON WIRE WORKS INDONESIA
        $c138 = Company::create(['name' => 'PT IRON WIRE WORKS INDONESIA', 'description' => 'WIRE (SWA, SWM-B, SWCH 10A)']);
        User::create(['username' => 'PT-IRO-129', 'name' => 'Supplier PT IRON WIRE WORKS INDONESIA', 'email' => 'ptiro129@example.com', 'password' => Hash::make('step-IIA-138'), 'role' => 'supplier', 'company_id' => $c138->id]);

        // 139. PT ISHO UTAMAS
        $c139 = Company::create(['name' => 'PT ISHO UTAMAS', 'description' => 'SUBCOUNT PRESS']);
        User::create(['username' => 'PT-ISH-130', 'name' => 'Supplier PT ISHO UTAMAS', 'email' => 'ptish130@example.com', 'password' => Hash::make('step-IAS-139'), 'role' => 'supplier', 'company_id' => $c139->id]);

        // 140. PT ISKW JAVA INDONESIA
        $c140 = Company::create(['name' => 'PT ISKW JAVA INDONESIA', 'description' => 'SUBCOUNT PRESS']);
        User::create(['username' => 'PT-ISK-131', 'name' => 'Supplier PT ISKW JAVA INDONESIA', 'email' => 'ptisk131@example.com', 'password' => Hash::make('step-IIA-140'), 'role' => 'supplier', 'company_id' => $c140->id]);

        // 141. PT ISRA PRESISI INDONESIA
        $c141 = Company::create(['name' => 'PT ISRA PRESISI INDONESIA', 'description' => 'SUBCOUNT PRESS']);
        User::create(['username' => 'PT-ISR-132', 'name' => 'Supplier PT ISRA PRESISI INDONESIA', 'email' => 'ptisr132@example.com', 'password' => Hash::make('step-IIA-141'), 'role' => 'supplier', 'company_id' => $c141->id]);

        // 142. PT IWATA BOLT INDONESIA
        $c142 = Company::create(['name' => 'PT IWATA BOLT INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-IWA-133', 'name' => 'Supplier PT IWATA BOLT INDONESIA', 'email' => 'ptiwa133@example.com', 'password' => Hash::make('step-IIA-142'), 'role' => 'supplier', 'company_id' => $c142->id]);

        // 143. PT IWATANI INDUSTRIAL GAS INDONESIA
        $c143 = Company::create(['name' => 'PT IWATANI INDUSTRIAL GAS INDONESIA', 'description' => 'CO2, AR, ACETYLENE, OKSIGEN']);
        User::create(['username' => 'PT-IWA-134', 'name' => 'Supplier PT IWATANI INDUSTRIAL GAS INDONESIA', 'email' => 'ptiwa134@example.com', 'password' => Hash::make('step-IIA-143'), 'role' => 'supplier', 'company_id' => $c143->id]);

        // 144. PT JABABEKA INFRASTRUKTUR
        $c144 = Company::create(['name' => 'PT JABABEKA INFRASTRUKTUR', 'description' => 'AIR']);
        User::create(['username' => 'PT-JAB-135', 'name' => 'Supplier PT JABABEKA INFRASTRUKTUR', 'email' => 'ptjab135@example.com', 'password' => Hash::make('step-JUR-144'), 'role' => 'supplier', 'company_id' => $c144->id]);

        // 145. PT JALY INDONESIA UTAMA
        $c145 = Company::create(['name' => 'PT JALY INDONESIA UTAMA', 'description' => 'SAFETY SHOES']);
        User::create(['username' => 'PT-JAL-136', 'name' => 'Supplier PT JALY INDONESIA UTAMA', 'email' => 'ptjal136@example.com', 'password' => Hash::make('step-JMA-145'), 'role' => 'supplier', 'company_id' => $c145->id]);

        // 146. PT JAVA CASTRINDO
        $c146 = Company::create(['name' => 'PT JAVA CASTRINDO', 'description' => 'OLI CASTROL']);
        User::create(['username' => 'PT-JAV-137', 'name' => 'Supplier PT JAVA CASTRINDO', 'email' => 'ptjav137@example.com', 'password' => Hash::make('step-JDO-146'), 'role' => 'supplier', 'company_id' => $c146->id]);

        // 147. PT JAVA MITRA TEKNIK
        $c147 = Company::create(['name' => 'PT JAVA MITRA TEKNIK', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-JAV-138', 'name' => 'Supplier PT JAVA MITRA TEKNIK', 'email' => 'ptjav138@example.com', 'password' => Hash::make('step-JIK-147'), 'role' => 'supplier', 'company_id' => $c147->id]);

        // 148. PT JAYA GAS
        $c148 = Company::create(['name' => 'PT JAYA GAS', 'description' => 'ELPIJI EX PERTAMINA']);
        User::create(['username' => 'PT-JAY-139', 'name' => 'Supplier PT JAYA GAS', 'email' => 'ptjay139@example.com', 'password' => Hash::make('step-JAS-148'), 'role' => 'supplier', 'company_id' => $c148->id]);

        // 149. PT JAYA GAS INDONESIA
        $c149 = Company::create(['name' => 'PT JAYA GAS INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-JAY-140', 'name' => 'Supplier PT JAYA GAS INDONESIA', 'email' => 'ptjay140@example.com', 'password' => Hash::make('step-JIA-149'), 'role' => 'supplier', 'company_id' => $c149->id]);

        // 150. PT JAYA METAL TEKNIKA
        $c150 = Company::create(['name' => 'PT JAYA METAL TEKNIKA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-JAY-141', 'name' => 'Supplier PT JAYA METAL TEKNIKA', 'email' => 'ptjay141@example.com', 'password' => Hash::make('step-JKA-150'), 'role' => 'supplier', 'company_id' => $c150->id]);

        // 151. PT JAYAINDO ABADI MAKMUR
        $c151 = Company::create(['name' => 'PT JAYAINDO ABADI MAKMUR', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-JAY-142', 'name' => 'Supplier PT JAYAINDO ABADI MAKMUR', 'email' => 'ptjay142@example.com', 'password' => Hash::make('step-JUR-151'), 'role' => 'supplier', 'company_id' => $c151->id]);

        // 152. PT JETA PLASTIK INDONESIA
        $c152 = Company::create(['name' => 'PT JETA PLASTIK INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-JET-143', 'name' => 'Supplier PT JETA PLASTIK INDONESIA', 'email' => 'ptjet143@example.com', 'password' => Hash::make('step-JIA-152'), 'role' => 'supplier', 'company_id' => $c152->id]);

        // 153. PT JFE SHOJI STEEL INDONESIA
        $c153 = Company::create(['name' => 'PT JFE SHOJI STEEL INDONESIA', 'description' => 'RAW MATERIAL PROD.']);
        User::create(['username' => 'PT-JFE-144', 'name' => 'Supplier PT JFE SHOJI STEEL INDONESIA', 'email' => 'ptjfe144@example.com', 'password' => Hash::make('step-JIA-153'), 'role' => 'supplier', 'company_id' => $c153->id]);

        // 154. PT JUMBO POWER INTERNATIONAL
        $c154 = Company::create(['name' => 'PT JUMBO POWER INTERNATIONAL', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-JUM-145', 'name' => 'Supplier PT JUMBO POWER INTERNATIONAL', 'email' => 'ptjum145@example.com', 'password' => Hash::make('step-JAL-154'), 'role' => 'supplier', 'company_id' => $c154->id]);

        // 155. PT KALASINDO PRIMA SEJAHTERA
        $c155 = Company::create(['name' => 'PT KALASINDO PRIMA SEJAHTERA', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-KAL-146', 'name' => 'Supplier PT KALASINDO PRIMA SEJAHTERA', 'email' => 'ptkal146@example.com', 'password' => Hash::make('step-KRA-155'), 'role' => 'supplier', 'company_id' => $c155->id]);

        // 156. PT KANEMATSU KGK INDONESIA
        $c156 = Company::create(['name' => 'PT KANEMATSU KGK INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-KAN-147', 'name' => 'Supplier PT KANEMATSU KGK INDONESIA', 'email' => 'ptkan147@example.com', 'password' => Hash::make('step-KIA-156'), 'role' => 'supplier', 'company_id' => $c156->id]);

        // 157. PT KARUNIA LIFTINDO PERKASA
        $c157 = Company::create(['name' => 'PT KARUNIA LIFTINDO PERKASA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-KAR-148', 'name' => 'Supplier PT KARUNIA LIFTINDO PERKASA', 'email' => 'ptkar148@example.com', 'password' => Hash::make('step-KSA-157'), 'role' => 'supplier', 'company_id' => $c157->id]);

        // 158. PT KARYA HASIL OPTIMA
        $c158 = Company::create(['name' => 'PT KARYA HASIL OPTIMA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-KAR-149', 'name' => 'Supplier PT KARYA HASIL OPTIMA', 'email' => 'ptkar149@example.com', 'password' => Hash::make('step-KMA-158'), 'role' => 'supplier', 'company_id' => $c158->id]);

        // 159. PT KARYA MAJU PRATAMA
        $c159 = Company::create(['name' => 'PT KARYA MAJU PRATAMA', 'description' => 'SPARE PART FOR DIES']);
        User::create(['username' => 'PT-KAR-150', 'name' => 'Supplier PT KARYA MAJU PRATAMA', 'email' => 'ptkar150@example.com', 'password' => Hash::make('step-KMA-159'), 'role' => 'supplier', 'company_id' => $c159->id]);

        // 160. CV KARYA MEGAH
        $c160 = Company::create(['name' => 'CV KARYA MEGAH', 'description' => 'MATERIAL FOR BUILDING MAINTENANCE']);
        User::create(['username' => 'CV-KAR-10', 'name' => 'Supplier CV KARYA MEGAH', 'email' => 'cvkar10@example.com', 'password' => Hash::make('step-KAH-160'), 'role' => 'supplier', 'company_id' => $c160->id]);

        // 161. PT KARYA SUKSES STEEL
        $c161 = Company::create(['name' => 'PT KARYA SUKSES STEEL', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-KAR-151', 'name' => 'Supplier PT KARYA SUKSES STEEL', 'email' => 'ptkar151@example.com', 'password' => Hash::make('step-KEL-161'), 'role' => 'supplier', 'company_id' => $c161->id]);

        // 162. PT KASHIMA SEIKI INDONESIA
        $c162 = Company::create(['name' => 'PT KASHIMA SEIKI INDONESIA', 'description' => 'SUBCONT BARREL']);
        User::create(['username' => 'PT-KAS-152', 'name' => 'Supplier PT KASHIMA SEIKI INDONESIA', 'email' => 'ptkas152@example.com', 'password' => Hash::make('step-KIA-162'), 'role' => 'supplier', 'company_id' => $c162->id]);

        // 163. PT KASTOR RODA INDONESIA
        $c163 = Company::create(['name' => 'PT KASTOR RODA INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-KAS-153', 'name' => 'Supplier PT KASTOR RODA INDONESIA', 'email' => 'ptkas153@example.com', 'password' => Hash::make('step-KIA-163'), 'role' => 'supplier', 'company_id' => $c163->id]);

        // 164. PT KATSUYAMA FiINETECH INDONESIA
        $c164 = Company::create(['name' => 'PT KATSUYAMA FiINETECH INDONESIA', 'description' => 'SUBCONT TREATMENT']);
        User::create(['username' => 'PT-KAT-154', 'name' => 'Supplier PT KATSUYAMA FiINETECH INDONESIA', 'email' => 'ptkat154@example.com', 'password' => Hash::make('step-KIA-164'), 'role' => 'supplier', 'company_id' => $c164->id]);

        // 165. PT KATSUYAMA FINETECH INDONESIA
        $c165 = Company::create(['name' => 'PT KATSUYAMA FINETECH INDONESIA', 'description' => 'CKD & SUBCONT']);
        User::create(['username' => 'PT-KAT-155', 'name' => 'Supplier PT KATSUYAMA FINETECH INDONESIA', 'email' => 'ptkat155@example.com', 'password' => Hash::make('step-KIA-165'), 'role' => 'supplier', 'company_id' => $c165->id]);

        // 166. PT KAWAN LAMA SEJAHTERA
        $c166 = Company::create(['name' => 'PT KAWAN LAMA SEJAHTERA', 'description' => 'SPARE PART FOR DIES']);
        User::create(['username' => 'PT-KAW-156', 'name' => 'Supplier PT KAWAN LAMA SEJAHTERA', 'email' => 'ptkaw156@example.com', 'password' => Hash::make('step-KRA-166'), 'role' => 'supplier', 'company_id' => $c166->id]);

        // 167. PT KAWAN LAMA SOLUSI
        $c167 = Company::create(['name' => 'PT KAWAN LAMA SOLUSI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-KAW-157', 'name' => 'Supplier PT KAWAN LAMA SOLUSI', 'email' => 'ptkaw157@example.com', 'password' => Hash::make('step-KSI-167'), 'role' => 'supplier', 'company_id' => $c167->id]);

        // 168. PT KEEP INDONESIA
        $c168 = Company::create(['name' => 'PT KEEP INDONESIA', 'description' => 'REPAIR FOR  PRESS MACHINE']);
        User::create(['username' => 'PT-KEE-158', 'name' => 'Supplier PT KEEP INDONESIA', 'email' => 'ptkee158@example.com', 'password' => Hash::make('step-KIA-168'), 'role' => 'supplier', 'company_id' => $c168->id]);

        // 169. PT KEYENCE INDONESIA
        $c169 = Company::create(['name' => 'PT KEYENCE INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-KEY-159', 'name' => 'Supplier PT KEYENCE INDONESIA', 'email' => 'ptkey159@example.com', 'password' => Hash::make('step-KIA-169'), 'role' => 'supplier', 'company_id' => $c169->id]);

        // 170. PT KHARISMA ESA UNGGUL
        $c170 = Company::create(['name' => 'PT KHARISMA ESA UNGGUL', 'description' => 'TRADING (HPT)']);
        User::create(['username' => 'PT-KHA-160', 'name' => 'Supplier PT KHARISMA ESA UNGGUL', 'email' => 'ptkha160@example.com', 'password' => Hash::make('step-KUL-170'), 'role' => 'supplier', 'company_id' => $c170->id]);

        // 171. PT KM TOWA INDONESIA
        $c171 = Company::create(['name' => 'PT KM TOWA INDONESIA', 'description' => 'DIES MAKING']);
        User::create(['username' => 'PT-KM -161', 'name' => 'Supplier PT KM TOWA INDONESIA', 'email' => 'ptkm161@example.com', 'password' => Hash::make('step-KIA-171'), 'role' => 'supplier', 'company_id' => $c171->id]);

        // 172. PT KONTINENTAL SARANA PERKASA
        $c172 = Company::create(['name' => 'PT KONTINENTAL SARANA PERKASA', 'description' => 'RAW MATERIAL PROD.']);
        User::create(['username' => 'PT-KON-162', 'name' => 'Supplier PT KONTINENTAL SARANA PERKASA', 'email' => 'ptkon162@example.com', 'password' => Hash::make('step-KSA-172'), 'role' => 'supplier', 'company_id' => $c172->id]);

        // 173. PT KOYO MARKETING AND PROCESSING INDONESIA
        $c173 = Company::create(['name' => 'PT KOYO MARKETING AND PROCESSING INDONESIA', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-KOY-163', 'name' => 'Supplier PT KOYO MARKETING AND PROCESSING INDONESIA', 'email' => 'ptkoy163@example.com', 'password' => Hash::make('step-KIA-173'), 'role' => 'supplier', 'company_id' => $c173->id]);

        // 174. PT KYOEI INDONESIA
        $c174 = Company::create(['name' => 'PT KYOEI INDONESIA', 'description' => 'SUBCONT MACHINING']);
        User::create(['username' => 'PT-KYO-164', 'name' => 'Supplier PT KYOEI INDONESIA', 'email' => 'ptkyo164@example.com', 'password' => Hash::make('step-KIA-174'), 'role' => 'supplier', 'company_id' => $c174->id]);

        // 175. PT LANGGENG LESTARI JAYA
        $c175 = Company::create(['name' => 'PT LANGGENG LESTARI JAYA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-LAN-165', 'name' => 'Supplier PT LANGGENG LESTARI JAYA', 'email' => 'ptlan165@example.com', 'password' => Hash::make('step-LYA-175'), 'role' => 'supplier', 'company_id' => $c175->id]);

        // 176. PT LASER METAL MANDIRI
        $c176 = Company::create(['name' => 'PT LASER METAL MANDIRI', 'description' => 'SUBCONT PRESS']);
        User::create(['username' => 'PT-LAS-166', 'name' => 'Supplier PT LASER METAL MANDIRI', 'email' => 'ptlas166@example.com', 'password' => Hash::make('step-LRI-176'), 'role' => 'supplier', 'company_id' => $c176->id]);

        // 177. PT LAUTAN MAS JAYA
        $c177 = Company::create(['name' => 'PT LAUTAN MAS JAYA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-LAU-167', 'name' => 'Supplier PT LAUTAN MAS JAYA', 'email' => 'ptlau167@example.com', 'password' => Hash::make('step-LYA-177'), 'role' => 'supplier', 'company_id' => $c177->id]);

        // 178. PT LAUTAN PERMATA JAYA
        $c178 = Company::create(['name' => 'PT LAUTAN PERMATA JAYA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-LAU-168', 'name' => 'Supplier PT LAUTAN PERMATA JAYA', 'email' => 'ptlau168@example.com', 'password' => Hash::make('step-LYA-178'), 'role' => 'supplier', 'company_id' => $c178->id]);

        // 179. PT LESTARI TEKNIK PLASTIKATAMA
        $c179 = Company::create(['name' => 'PT LESTARI TEKNIK PLASTIKATAMA', 'description' => 'SUBCONT PRESS']);
        User::create(['username' => 'PT-LES-169', 'name' => 'Supplier PT LESTARI TEKNIK PLASTIKATAMA', 'email' => 'ptles169@example.com', 'password' => Hash::make('step-LMA-179'), 'role' => 'supplier', 'company_id' => $c179->id]);

        // 180. PT LOGICA ENGINEERING
        $c180 = Company::create(['name' => 'PT LOGICA ENGINEERING', 'description' => 'MACHINE REPAIR, SUPPLY OF SPARE PART']);
        User::create(['username' => 'PT-LOG-170', 'name' => 'Supplier PT LOGICA ENGINEERING', 'email' => 'ptlog170@example.com', 'password' => Hash::make('step-LNG-180'), 'role' => 'supplier', 'company_id' => $c180->id]);

        // 181. PT MAHKOTA BANDUNG TEKNIK
        $c181 = Company::create(['name' => 'PT MAHKOTA BANDUNG TEKNIK', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-MAH-171', 'name' => 'Supplier PT MAHKOTA BANDUNG TEKNIK', 'email' => 'ptmah171@example.com', 'password' => Hash::make('step-MIK-181'), 'role' => 'supplier', 'company_id' => $c181->id]);

        // 182. PT MARUHIDE INDONESIA
        $c182 = Company::create(['name' => 'PT MARUHIDE INDONESIA', 'description' => 'SUBCONT PRESS']);
        User::create(['username' => 'PT-MAR-172', 'name' => 'Supplier PT MARUHIDE INDONESIA', 'email' => 'ptmar172@example.com', 'password' => Hash::make('step-MIA-182'), 'role' => 'supplier', 'company_id' => $c182->id]);

        // 183. PT MARUKA INDONESIA
        $c183 = Company::create(['name' => 'PT MARUKA INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-MAR-173', 'name' => 'Supplier PT MARUKA INDONESIA', 'email' => 'ptmar173@example.com', 'password' => Hash::make('step-MIA-183'), 'role' => 'supplier', 'company_id' => $c183->id]);

        // 184. PT MARUKIN SOLTEK INDONESIA
        $c184 = Company::create(['name' => 'PT MARUKIN SOLTEK INDONESIA', 'description' => 'DIES']);
        User::create(['username' => 'PT-MAR-174', 'name' => 'Supplier PT MARUKIN SOLTEK INDONESIA', 'email' => 'ptmar174@example.com', 'password' => Hash::make('step-MIA-184'), 'role' => 'supplier', 'company_id' => $c184->id]);

        // 185. PT MC REACTIVE INDONESIA
        $c185 = Company::create(['name' => 'PT MC REACTIVE INDONESIA', 'description' => 'CHEMICAL GEOMET']);
        User::create(['username' => 'PT-MC -175', 'name' => 'Supplier PT MC REACTIVE INDONESIA', 'email' => 'ptmc175@example.com', 'password' => Hash::make('step-MIA-185'), 'role' => 'supplier', 'company_id' => $c185->id]);

        // 186. PT MEIDOH INDONESIA
        $c186 = Company::create(['name' => 'PT MEIDOH INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-MEI-176', 'name' => 'Supplier PT MEIDOH INDONESIA', 'email' => 'ptmei176@example.com', 'password' => Hash::make('step-MIA-186'), 'role' => 'supplier', 'company_id' => $c186->id]);

        // 187. PT Metacom Karunia Lestari
        $c187 = Company::create(['name' => 'PT Metacom Karunia Lestari', 'description' => 'PERANGKAT KOMPUTER']);
        User::create(['username' => 'PT-Met-177', 'name' => 'Supplier PT Metacom Karunia Lestari', 'email' => 'ptmet177@example.com', 'password' => Hash::make('step-Mri-187'), 'role' => 'supplier', 'company_id' => $c187->id]);

        // 188. PT METRO POWER INDUSTRI
        $c188 = Company::create(['name' => 'PT METRO POWER INDUSTRI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-MET-178', 'name' => 'Supplier PT METRO POWER INDUSTRI', 'email' => 'ptmet178@example.com', 'password' => Hash::make('step-MRI-188'), 'role' => 'supplier', 'company_id' => $c188->id]);

        // 189. PT MHB INDONESIA
        $c189 = Company::create(['name' => 'PT MHB INDONESIA', 'description' => 'FORKLIFT']);
        User::create(['username' => 'PT-MHB-179', 'name' => 'Supplier PT MHB INDONESIA', 'email' => 'ptmhb179@example.com', 'password' => Hash::make('step-MIA-189'), 'role' => 'supplier', 'company_id' => $c189->id]);

        // 190. PT MISUMI INDONESIA
        $c190 = Company::create(['name' => 'PT MISUMI INDONESIA', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-MIS-180', 'name' => 'Supplier PT MISUMI INDONESIA', 'email' => 'ptmis180@example.com', 'password' => Hash::make('step-MIA-190'), 'role' => 'supplier', 'company_id' => $c190->id]);

        // 191. PT MITRA ASMOCO UTAMA
        $c191 = Company::create(['name' => 'PT MITRA ASMOCO UTAMA', 'description' => 'PELUMAS (OLI)']);
        User::create(['username' => 'PT-MIT-181', 'name' => 'Supplier PT MITRA ASMOCO UTAMA', 'email' => 'ptmit181@example.com', 'password' => Hash::make('step-MMA-191'), 'role' => 'supplier', 'company_id' => $c191->id]);

        // 192. PT MITRA JAYA MAKMUR
        $c192 = Company::create(['name' => 'PT MITRA JAYA MAKMUR', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-MIT-182', 'name' => 'Supplier PT MITRA JAYA MAKMUR', 'email' => 'ptmit182@example.com', 'password' => Hash::make('step-MUR-192'), 'role' => 'supplier', 'company_id' => $c192->id]);

        // 193. PT MITRA SARUTA INDONESIA
        $c193 = Company::create(['name' => 'PT MITRA SARUTA INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-MIT-183', 'name' => 'Supplier PT MITRA SARUTA INDONESIA', 'email' => 'ptmit183@example.com', 'password' => Hash::make('step-MIA-193'), 'role' => 'supplier', 'company_id' => $c193->id]);

        // 194. PT MITRA TAMA GEMILANG
        $c194 = Company::create(['name' => 'PT MITRA TAMA GEMILANG', 'description' => 'RAW MATERIAL DIES']);
        User::create(['username' => 'PT-MIT-184', 'name' => 'Supplier PT MITRA TAMA GEMILANG', 'email' => 'ptmit184@example.com', 'password' => Hash::make('step-MNG-194'), 'role' => 'supplier', 'company_id' => $c194->id]);

        // 195. PT MITSUIANDCO MACHINE TECH INDONESIA
        $c195 = Company::create(['name' => 'PT MITSUIANDCO MACHINE TECH INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-MIT-185', 'name' => 'Supplier PT MITSUIANDCO MACHINE TECH INDONESIA', 'email' => 'ptmit185@example.com', 'password' => Hash::make('step-MIA-195'), 'role' => 'supplier', 'company_id' => $c195->id]);

        // 196. PT MIURA INDONESIA
        $c196 = Company::create(['name' => 'PT MIURA INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-MIU-186', 'name' => 'Supplier PT MIURA INDONESIA', 'email' => 'ptmiu186@example.com', 'password' => Hash::make('step-MIA-196'), 'role' => 'supplier', 'company_id' => $c196->id]);

        // 197. PT MORA GLOBAL TEHNIK
        $c197 = Company::create(['name' => 'PT MORA GLOBAL TEHNIK', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-MOR-187', 'name' => 'Supplier PT MORA GLOBAL TEHNIK', 'email' => 'ptmor187@example.com', 'password' => Hash::make('step-MIK-197'), 'role' => 'supplier', 'company_id' => $c197->id]);

        // 198. PT MUDA TEKINDO
        $c198 = Company::create(['name' => 'PT MUDA TEKINDO', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-MUD-188', 'name' => 'Supplier PT MUDA TEKINDO', 'email' => 'ptmud188@example.com', 'password' => Hash::make('step-MDO-198'), 'role' => 'supplier', 'company_id' => $c198->id]);

        // 199. PT MUKTI ABADI SADAYA
        $c199 = Company::create(['name' => 'PT MUKTI ABADI SADAYA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-MUK-189', 'name' => 'Supplier PT MUKTI ABADI SADAYA', 'email' => 'ptmuk189@example.com', 'password' => Hash::make('step-MYA-199'), 'role' => 'supplier', 'company_id' => $c199->id]);

        // 200. PT NADESCO INDONESIA
        $c200 = Company::create(['name' => 'PT NADESCO INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-NAD-190', 'name' => 'Supplier PT NADESCO INDONESIA', 'email' => 'ptnad190@example.com', 'password' => Hash::make('step-NIA-200'), 'role' => 'supplier', 'company_id' => $c200->id]);

        // 201. PT NARAJS INTI GANDA
        $c201 = Company::create(['name' => 'PT NARAJS INTI GANDA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-NAR-191', 'name' => 'Supplier PT NARAJS INTI GANDA', 'email' => 'ptnar191@example.com', 'password' => Hash::make('step-NDA-201'), 'role' => 'supplier', 'company_id' => $c201->id]);

        // 202. PT NATAWIJAYA SEJAHTERA
        $c202 = Company::create(['name' => 'PT NATAWIJAYA SEJAHTERA', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-NAT-192', 'name' => 'Supplier PT NATAWIJAYA SEJAHTERA', 'email' => 'ptnat192@example.com', 'password' => Hash::make('step-NRA-202'), 'role' => 'supplier', 'company_id' => $c202->id]);

        // 203. PT NATINDO JAYA MANDIRI
        $c203 = Company::create(['name' => 'PT NATINDO JAYA MANDIRI', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-NAT-193', 'name' => 'Supplier PT NATINDO JAYA MANDIRI', 'email' => 'ptnat193@example.com', 'password' => Hash::make('step-NRI-203'), 'role' => 'supplier', 'company_id' => $c203->id]);

        // 204. PT NIC INDONESIA
        $c204 = Company::create(['name' => 'PT NIC INDONESIA', 'description' => 'SUBCONT PLATING']);
        User::create(['username' => 'PT-NIC-194', 'name' => 'Supplier PT NIC INDONESIA', 'email' => 'ptnic194@example.com', 'password' => Hash::make('step-NIA-204'), 'role' => 'supplier', 'company_id' => $c204->id]);

        // 205. PT NICHIAS SUNIJAYA
        $c205 = Company::create(['name' => 'PT NICHIAS SUNIJAYA', 'description' => 'CKD']);
        User::create(['username' => 'PT-NIC-195', 'name' => 'Supplier PT NICHIAS SUNIJAYA', 'email' => 'ptnic195@example.com', 'password' => Hash::make('step-NYA-205'), 'role' => 'supplier', 'company_id' => $c205->id]);

        // 206. PT NIFCO INDONESIA
        $c206 = Company::create(['name' => 'PT NIFCO INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-NIF-196', 'name' => 'Supplier PT NIFCO INDONESIA', 'email' => 'ptnif196@example.com', 'password' => Hash::make('step-NIA-206'), 'role' => 'supplier', 'company_id' => $c206->id]);

        // 207. PT NIPPON DACRO SHAMROCK CO., LTD
        $c207 = Company::create(['name' => 'PT NIPPON DACRO SHAMROCK CO., LTD', 'description' => 'GEOMET']);
        User::create(['username' => 'PT-NIP-197', 'name' => 'Supplier PT NIPPON DACRO SHAMROCK CO., LTD', 'email' => 'ptnip197@example.com', 'password' => Hash::make('step-NTD-207'), 'role' => 'supplier', 'company_id' => $c207->id]);

        // 208. PT NITTO ALAM INDONESIA
        $c208 = Company::create(['name' => 'PT NITTO ALAM INDONESIA', 'description' => 'BOLT, RIVET PIN']);
        User::create(['username' => 'PT-NIT-198', 'name' => 'Supplier PT NITTO ALAM INDONESIA', 'email' => 'ptnit198@example.com', 'password' => Hash::make('step-NIA-208'), 'role' => 'supplier', 'company_id' => $c208->id]);

        // 209. PT NOBEL RIGGINDO SAMUDRA
        $c209 = Company::create(['name' => 'PT NOBEL RIGGINDO SAMUDRA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-NOB-199', 'name' => 'Supplier PT NOBEL RIGGINDO SAMUDRA', 'email' => 'ptnob199@example.com', 'password' => Hash::make('step-NRA-209'), 'role' => 'supplier', 'company_id' => $c209->id]);

        // 210. PT NOERHAYAT BERKAH SEJAHTERA
        $c210 = Company::create(['name' => 'PT NOERHAYAT BERKAH SEJAHTERA', 'description' => 'SUBCONT PRESS']);
        User::create(['username' => 'PT-NOE-200', 'name' => 'Supplier PT NOERHAYAT BERKAH SEJAHTERA', 'email' => 'ptnoe200@example.com', 'password' => Hash::make('step-NRA-210'), 'role' => 'supplier', 'company_id' => $c210->id]);

        // 211. PT NOF METAL COATINGS ASIA PACIFIC CO., LTD.
        $c211 = Company::create(['name' => 'PT NOF METAL COATINGS ASIA PACIFIC CO., LTD.', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-NOF-201', 'name' => 'Supplier PT NOF METAL COATINGS ASIA PACIFIC CO., LTD.', 'email' => 'ptnof201@example.com', 'password' => Hash::make('step-ND.-211'), 'role' => 'supplier', 'company_id' => $c211->id]);

        // 212. PT NOK INDONESIA SALES
        $c212 = Company::create(['name' => 'PT NOK INDONESIA SALES', 'description' => 'CKD']);
        User::create(['username' => 'PT-NOK-202', 'name' => 'Supplier PT NOK INDONESIA SALES', 'email' => 'ptnok202@example.com', 'password' => Hash::make('step-NES-212'), 'role' => 'supplier', 'company_id' => $c212->id]);

        // 213. PT NUSA TOYOTETSU CORPORATION
        $c213 = Company::create(['name' => 'PT NUSA TOYOTETSU CORPORATION', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-NUS-203', 'name' => 'Supplier PT NUSA TOYOTETSU CORPORATION', 'email' => 'ptnus203@example.com', 'password' => Hash::make('step-NON-213'), 'role' => 'supplier', 'company_id' => $c213->id]);

        // 214. PT OASIS MITRA INDUSTRINDO
        $c214 = Company::create(['name' => 'PT OASIS MITRA INDUSTRINDO', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-OAS-204', 'name' => 'Supplier PT OASIS MITRA INDUSTRINDO', 'email' => 'ptoas204@example.com', 'password' => Hash::make('step-ODO-214'), 'role' => 'supplier', 'company_id' => $c214->id]);

        // 215. PT OCHIAI MENARA INDONESIA
        $c215 = Company::create(['name' => 'PT OCHIAI MENARA INDONESIA', 'description' => 'SUBCONT HARDENING']);
        User::create(['username' => 'PT-OCH-205', 'name' => 'Supplier PT OCHIAI MENARA INDONESIA', 'email' => 'ptoch205@example.com', 'password' => Hash::make('step-OIA-215'), 'role' => 'supplier', 'company_id' => $c215->id]);

        // 216. PT OCTO CORINDO SARANA
        $c216 = Company::create(['name' => 'PT OCTO CORINDO SARANA', 'description' => 'STEEL SHOT S-170']);
        User::create(['username' => 'PT-OCT-206', 'name' => 'Supplier PT OCTO CORINDO SARANA', 'email' => 'ptoct206@example.com', 'password' => Hash::make('step-ONA-216'), 'role' => 'supplier', 'company_id' => $c216->id]);

        // 217. PT OERLIKON BALZERS ARTODA INDONESIA
        $c217 = Company::create(['name' => 'PT OERLIKON BALZERS ARTODA INDONESIA', 'description' => 'SUBCONT DIES']);
        User::create(['username' => 'PT-OER-207', 'name' => 'Supplier PT OERLIKON BALZERS ARTODA INDONESIA', 'email' => 'ptoer207@example.com', 'password' => Hash::make('step-OIA-217'), 'role' => 'supplier', 'company_id' => $c217->id]);

        // 218. PT OHARA HALIM CHEMICAL
        $c218 = Company::create(['name' => 'PT OHARA HALIM CHEMICAL', 'description' => 'CHEMICAL']);
        User::create(['username' => 'PT-OHA-208', 'name' => 'Supplier PT OHARA HALIM CHEMICAL', 'email' => 'ptoha208@example.com', 'password' => Hash::make('step-OAL-218'), 'role' => 'supplier', 'company_id' => $c218->id]);

        // 219. PT OHARA HALIM CHEMICALS INDONESIA
        $c219 = Company::create(['name' => 'PT OHARA HALIM CHEMICALS INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-OHA-209', 'name' => 'Supplier PT OHARA HALIM CHEMICALS INDONESIA', 'email' => 'ptoha209@example.com', 'password' => Hash::make('step-OIA-219'), 'role' => 'supplier', 'company_id' => $c219->id]);

        // 220. PT OKI BENJAYA PERSADA
        $c220 = Company::create(['name' => 'PT OKI BENJAYA PERSADA', 'description' => 'OUTSOURCHING']);
        User::create(['username' => 'PT-OKI-210', 'name' => 'Supplier PT OKI BENJAYA PERSADA', 'email' => 'ptoki210@example.com', 'password' => Hash::make('step-ODA-220'), 'role' => 'supplier', 'company_id' => $c220->id]);

        // 221. PT ONE HEART SOLUTION
        $c221 = Company::create(['name' => 'PT ONE HEART SOLUTION', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ONE-211', 'name' => 'Supplier PT ONE HEART SOLUTION', 'email' => 'ptone211@example.com', 'password' => Hash::make('step-OON-221'), 'role' => 'supplier', 'company_id' => $c221->id]);

        // 222. PT ORITSU TEKNOLOGI INDONESIA
        $c222 = Company::create(['name' => 'PT ORITSU TEKNOLOGI INDONESIA', 'description' => 'SUBCONT DIES']);
        User::create(['username' => 'PT-ORI-212', 'name' => 'Supplier PT ORITSU TEKNOLOGI INDONESIA', 'email' => 'ptori212@example.com', 'password' => Hash::make('step-OIA-222'), 'role' => 'supplier', 'company_id' => $c222->id]);

        // 223. CV OSAZE MANDIRI
        $c223 = Company::create(['name' => 'CV OSAZE MANDIRI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'CV-OSA-11', 'name' => 'Supplier CV OSAZE MANDIRI', 'email' => 'cvosa11@example.com', 'password' => Hash::make('step-ORI-223'), 'role' => 'supplier', 'company_id' => $c223->id]);

        // 224. PT OTO MULTIARTHA
        $c224 = Company::create(['name' => 'PT OTO MULTIARTHA', 'description' => 'MOBIL']);
        User::create(['username' => 'PT-OTO-213', 'name' => 'Supplier PT OTO MULTIARTHA', 'email' => 'ptoto213@example.com', 'password' => Hash::make('step-OHA-224'), 'role' => 'supplier', 'company_id' => $c224->id]);

        // 225. PT PANANJUNG ANUGRAH SOLUTION
        $c225 = Company::create(['name' => 'PT PANANJUNG ANUGRAH SOLUTION', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-PAN-214', 'name' => 'Supplier PT PANANJUNG ANUGRAH SOLUTION', 'email' => 'ptpan214@example.com', 'password' => Hash::make('step-PON-225'), 'role' => 'supplier', 'company_id' => $c225->id]);

        // 226. PT PANDU HYDRO PNEUMATICS
        $c226 = Company::create(['name' => 'PT PANDU HYDRO PNEUMATICS', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-PAN-215', 'name' => 'Supplier PT PANDU HYDRO PNEUMATICS', 'email' => 'ptpan215@example.com', 'password' => Hash::make('step-PCS-226'), 'role' => 'supplier', 'company_id' => $c226->id]);

        // 227. PT PARKER METAL TREATMENT INDONESIA
        $c227 = Company::create(['name' => 'PT PARKER METAL TREATMENT INDONESIA', 'description' => 'SUBCONT TREATMENT']);
        User::create(['username' => 'PT-PAR-216', 'name' => 'Supplier PT PARKER METAL TREATMENT INDONESIA', 'email' => 'ptpar216@example.com', 'password' => Hash::make('step-PIA-227'), 'role' => 'supplier', 'company_id' => $c227->id]);

        // 228. PT PELITA SEHAT
        $c228 = Company::create(['name' => 'PT PELITA SEHAT', 'description' => 'CHECKING FIXTURE,JIG']);
        User::create(['username' => 'PT-PEL-217', 'name' => 'Supplier PT PELITA SEHAT', 'email' => 'ptpel217@example.com', 'password' => Hash::make('step-PAT-228'), 'role' => 'supplier', 'company_id' => $c228->id]);

        // 229. PT PENTAPLAST MULTIJAYA
        $c229 = Company::create(['name' => 'PT PENTAPLAST MULTIJAYA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-PEN-218', 'name' => 'Supplier PT PENTAPLAST MULTIJAYA', 'email' => 'ptpen218@example.com', 'password' => Hash::make('step-PYA-229'), 'role' => 'supplier', 'company_id' => $c229->id]);

        // 230. PT PERWIRA ADHITAMA SEJATI
        $c230 = Company::create(['name' => 'PT PERWIRA ADHITAMA SEJATI', 'description' => 'PERDAGANGAN SUB DISTRIBUTOR, EKSPOR-IMPOR LOGAM,MESIN,ALAT KONSTRUKSI']);
        User::create(['username' => 'PT-PER-219', 'name' => 'Supplier PT PERWIRA ADHITAMA SEJATI', 'email' => 'ptper219@example.com', 'password' => Hash::make('step-PTI-230'), 'role' => 'supplier', 'company_id' => $c230->id]);

        // 231. PT POLAR SOLUSINDO
        $c231 = Company::create(['name' => 'PT POLAR SOLUSINDO', 'description' => 'FOTO COPY']);
        User::create(['username' => 'PT-POL-220', 'name' => 'Supplier PT POLAR SOLUSINDO', 'email' => 'ptpol220@example.com', 'password' => Hash::make('step-PDO-231'), 'role' => 'supplier', 'company_id' => $c231->id]);

        // 232. PT POSCO IJPC
        $c232 = Company::create(['name' => 'PT POSCO IJPC', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-POS-221', 'name' => 'Supplier PT POSCO IJPC', 'email' => 'ptpos221@example.com', 'password' => Hash::make('step-PPC-232'), 'role' => 'supplier', 'company_id' => $c232->id]);

        // 233. PT POSMI STEEL INDONESIA
        $c233 = Company::create(['name' => 'PT POSMI STEEL INDONESIA', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-POS-222', 'name' => 'Supplier PT POSMI STEEL INDONESIA', 'email' => 'ptpos222@example.com', 'password' => Hash::make('step-PIA-233'), 'role' => 'supplier', 'company_id' => $c233->id]);

        // 234. PT PRABUMAS ARTA MULIA
        $c234 = Company::create(['name' => 'PT PRABUMAS ARTA MULIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-PRA-223', 'name' => 'Supplier PT PRABUMAS ARTA MULIA', 'email' => 'ptpra223@example.com', 'password' => Hash::make('step-PIA-234'), 'role' => 'supplier', 'company_id' => $c234->id]);

        // 235. PT PRECISION TOOL SERVICE INDONESIA
        $c235 = Company::create(['name' => 'PT PRECISION TOOL SERVICE INDONESIA', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-PRE-224', 'name' => 'Supplier PT PRECISION TOOL SERVICE INDONESIA', 'email' => 'ptpre224@example.com', 'password' => Hash::make('step-PIA-235'), 'role' => 'supplier', 'company_id' => $c235->id]);

        // 236. PT PRIMA CIPTA MEGAH
        $c236 = Company::create(['name' => 'PT PRIMA CIPTA MEGAH', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-PRI-225', 'name' => 'Supplier PT PRIMA CIPTA MEGAH', 'email' => 'ptpri225@example.com', 'password' => Hash::make('step-PAH-236'), 'role' => 'supplier', 'company_id' => $c236->id]);

        // 237. PT PRIMA NANO COATING
        $c237 = Company::create(['name' => 'PT PRIMA NANO COATING', 'description' => 'SUBCONT DIES']);
        User::create(['username' => 'PT-PRI-226', 'name' => 'Supplier PT PRIMA NANO COATING', 'email' => 'ptpri226@example.com', 'password' => Hash::make('step-PNG-237'), 'role' => 'supplier', 'company_id' => $c237->id]);

        // 238. PT PRIMA TIGON GLOBAL
        $c238 = Company::create(['name' => 'PT PRIMA TIGON GLOBAL', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-PRI-227', 'name' => 'Supplier PT PRIMA TIGON GLOBAL', 'email' => 'ptpri227@example.com', 'password' => Hash::make('step-PAL-238'), 'role' => 'supplier', 'company_id' => $c238->id]);

        // 239. PT PRIMA TOOLING
        $c239 = Company::create(['name' => 'PT PRIMA TOOLING', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-PRI-228', 'name' => 'Supplier PT PRIMA TOOLING', 'email' => 'ptpri228@example.com', 'password' => Hash::make('step-PNG-239'), 'role' => 'supplier', 'company_id' => $c239->id]);

        // 240. PT PRIUK PERKASA ABADI
        $c240 = Company::create(['name' => 'PT PRIUK PERKASA ABADI', 'description' => 'SUBCONT PLATING, PAINTING & TREATMENT']);
        User::create(['username' => 'PT-PRI-229', 'name' => 'Supplier PT PRIUK PERKASA ABADI', 'email' => 'ptpri229@example.com', 'password' => Hash::make('step-PDI-240'), 'role' => 'supplier', 'company_id' => $c240->id]);

        // 241. PT PUNDI MATRAS PRATAMA
        $c241 = Company::create(['name' => 'PT PUNDI MATRAS PRATAMA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-PUN-230', 'name' => 'Supplier PT PUNDI MATRAS PRATAMA', 'email' => 'ptpun230@example.com', 'password' => Hash::make('step-PMA-241'), 'role' => 'supplier', 'company_id' => $c241->id]);

        // 242. PT PUNINAR MSE
        $c242 = Company::create(['name' => 'PT PUNINAR MSE', 'description' => 'FORWARDER']);
        User::create(['username' => 'PT-PUN-231', 'name' => 'Supplier PT PUNINAR MSE', 'email' => 'ptpun231@example.com', 'password' => Hash::make('step-PSE-242'), 'role' => 'supplier', 'company_id' => $c242->id]);

        // 243. PT PUTRA ALAM TEKNOLOGI INDONESIA
        $c243 = Company::create(['name' => 'PT PUTRA ALAM TEKNOLOGI INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-PUT-232', 'name' => 'Supplier PT PUTRA ALAM TEKNOLOGI INDONESIA', 'email' => 'ptput232@example.com', 'password' => Hash::make('step-PIA-243'), 'role' => 'supplier', 'company_id' => $c243->id]);

        // 244. PT PUTRA ALAM TEKNOLOGI INDONESIA
        $c244 = Company::create(['name' => 'PT PUTRA ALAM TEKNOLOGI INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-PUT-233', 'name' => 'Supplier PT PUTRA ALAM TEKNOLOGI INDONESIA', 'email' => 'ptput233@example.com', 'password' => Hash::make('step-PIA-244'), 'role' => 'supplier', 'company_id' => $c244->id]);

        // 245. PT PUTRABANGUN CITRA
        $c245 = Company::create(['name' => 'PT PUTRABANGUN CITRA', 'description' => 'PIN, HANDLE SIDE GATE,']);
        User::create(['username' => 'PT-PUT-234', 'name' => 'Supplier PT PUTRABANGUN CITRA', 'email' => 'ptput234@example.com', 'password' => Hash::make('step-PRA-245'), 'role' => 'supplier', 'company_id' => $c245->id]);

        // 246. PT PUTRABANGUN CITRA MANDIRI
        $c246 = Company::create(['name' => 'PT PUTRABANGUN CITRA MANDIRI', 'description' => 'PIN, HANDLE SIDE GATE,']);
        User::create(['username' => 'PT-PUT-235', 'name' => 'Supplier PT PUTRABANGUN CITRA MANDIRI', 'email' => 'ptput235@example.com', 'password' => Hash::make('step-PRI-246'), 'role' => 'supplier', 'company_id' => $c246->id]);

        // 247. PT PUTRABANGUN CITRAMANDIRI
        $c247 = Company::create(['name' => 'PT PUTRABANGUN CITRAMANDIRI', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-PUT-236', 'name' => 'Supplier PT PUTRABANGUN CITRAMANDIRI', 'email' => 'ptput236@example.com', 'password' => Hash::make('step-PRI-247'), 'role' => 'supplier', 'company_id' => $c247->id]);

        // 248. PT QUANTUM MITRA NUSA
        $c248 = Company::create(['name' => 'PT QUANTUM MITRA NUSA', 'description' => 'DIES MAKING']);
        User::create(['username' => 'PT-QUA-237', 'name' => 'Supplier PT QUANTUM MITRA NUSA', 'email' => 'ptqua237@example.com', 'password' => Hash::make('step-QSA-248'), 'role' => 'supplier', 'company_id' => $c248->id]);

        // 249. PT RADIANT JAYA BERSAMA
        $c249 = Company::create(['name' => 'PT RADIANT JAYA BERSAMA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-RAD-238', 'name' => 'Supplier PT RADIANT JAYA BERSAMA', 'email' => 'ptrad238@example.com', 'password' => Hash::make('step-RMA-249'), 'role' => 'supplier', 'company_id' => $c249->id]);

        // 250. PT RADINTA ANUGERAH MANDIRI
        $c250 = Company::create(['name' => 'PT RADINTA ANUGERAH MANDIRI', 'description' => 'SERAGAM KERJA']);
        User::create(['username' => 'PT-RAD-239', 'name' => 'Supplier PT RADINTA ANUGERAH MANDIRI', 'email' => 'ptrad239@example.com', 'password' => Hash::make('step-RRI-250'), 'role' => 'supplier', 'company_id' => $c250->id]);

        // 251. PT RAHMAN SOLUSI INDONESIA
        $c251 = Company::create(['name' => 'PT RAHMAN SOLUSI INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-RAH-240', 'name' => 'Supplier PT RAHMAN SOLUSI INDONESIA', 'email' => 'ptrah240@example.com', 'password' => Hash::make('step-RIA-251'), 'role' => 'supplier', 'company_id' => $c251->id]);

        // 252. PT RAN ANDALAN INDONESIA
        $c252 = Company::create(['name' => 'PT RAN ANDALAN INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-RAN-241', 'name' => 'Supplier PT RAN ANDALAN INDONESIA', 'email' => 'ptran241@example.com', 'password' => Hash::make('step-RIA-252'), 'role' => 'supplier', 'company_id' => $c252->id]);

        // 253. PT REKADAYA MULTI ADIPRIMA
        $c253 = Company::create(['name' => 'PT REKADAYA MULTI ADIPRIMA', 'description' => 'CKD']);
        User::create(['username' => 'PT-REK-242', 'name' => 'Supplier PT REKADAYA MULTI ADIPRIMA', 'email' => 'ptrek242@example.com', 'password' => Hash::make('step-RMA-253'), 'role' => 'supplier', 'company_id' => $c253->id]);

        // 254. CV RELATION TECHNICAL INDONESIA
        $c254 = Company::create(['name' => 'CV RELATION TECHNICAL INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'CV-REL-12', 'name' => 'Supplier CV RELATION TECHNICAL INDONESIA', 'email' => 'cvrel12@example.com', 'password' => Hash::make('step-RIA-254'), 'role' => 'supplier', 'company_id' => $c254->id]);

        // 255. PT RIAN TEKNIK MANDIRI
        $c255 = Company::create(['name' => 'PT RIAN TEKNIK MANDIRI', 'description' => 'TOOLS & TECHNICAL EQUIPMENTS']);
        User::create(['username' => 'PT-RIA-243', 'name' => 'Supplier PT RIAN TEKNIK MANDIRI', 'email' => 'ptria243@example.com', 'password' => Hash::make('step-RRI-255'), 'role' => 'supplier', 'company_id' => $c255->id]);

        // 256. PT RUKUN SEJAHTERA TEKNIK
        $c256 = Company::create(['name' => 'PT RUKUN SEJAHTERA TEKNIK', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-RUK-244', 'name' => 'Supplier PT RUKUN SEJAHTERA TEKNIK', 'email' => 'ptruk244@example.com', 'password' => Hash::make('step-RIK-256'), 'role' => 'supplier', 'company_id' => $c256->id]);

        // 257. PT RYANA ASTA JAYA
        $c257 = Company::create(['name' => 'PT RYANA ASTA JAYA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-RYA-245', 'name' => 'Supplier PT RYANA ASTA JAYA', 'email' => 'ptrya245@example.com', 'password' => Hash::make('step-RYA-257'), 'role' => 'supplier', 'company_id' => $c257->id]);

        // 258. PT SADIKUN NIAGAMAS RAYA
        $c258 = Company::create(['name' => 'PT SADIKUN NIAGAMAS RAYA', 'description' => 'GAS ELPIJI']);
        User::create(['username' => 'PT-SAD-246', 'name' => 'Supplier PT SADIKUN NIAGAMAS RAYA', 'email' => 'ptsad246@example.com', 'password' => Hash::make('step-SYA-258'), 'role' => 'supplier', 'company_id' => $c258->id]);

        // 259. PT SADIKUN NIAGAMAS RAYA
        $c259 = Company::create(['name' => 'PT SADIKUN NIAGAMAS RAYA', 'description' => 'GAS ELPIJI']);
        User::create(['username' => 'PT-SAD-247', 'name' => 'Supplier PT SADIKUN NIAGAMAS RAYA', 'email' => 'ptsad247@example.com', 'password' => Hash::make('step-SYA-259'), 'role' => 'supplier', 'company_id' => $c259->id]);

        // 260. PT SAGA HIKARI TEKNINDO
        $c260 = Company::create(['name' => 'PT SAGA HIKARI TEKNINDO', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-SAG-248', 'name' => 'Supplier PT SAGA HIKARI TEKNINDO', 'email' => 'ptsag248@example.com', 'password' => Hash::make('step-SDO-260'), 'role' => 'supplier', 'company_id' => $c260->id]);

        // 261. PT SAHABAT INDONESIA INTI MANDIRI
        $c261 = Company::create(['name' => 'PT SAHABAT INDONESIA INTI MANDIRI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SAH-249', 'name' => 'Supplier PT SAHABAT INDONESIA INTI MANDIRI', 'email' => 'ptsah249@example.com', 'password' => Hash::make('step-SRI-261'), 'role' => 'supplier', 'company_id' => $c261->id]);

        // 262. PT SAMAFITRO
        $c262 = Company::create(['name' => 'PT SAMAFITRO', 'description' => 'AIR']);
        User::create(['username' => 'PT-SAM-250', 'name' => 'Supplier PT SAMAFITRO', 'email' => 'ptsam250@example.com', 'password' => Hash::make('step-SRO-262'), 'role' => 'supplier', 'company_id' => $c262->id]);

        // 263. PT SAMUDRA DUNIA RAYA
        $c263 = Company::create(['name' => 'PT SAMUDRA DUNIA RAYA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-SAM-251', 'name' => 'Supplier PT SAMUDRA DUNIA RAYA', 'email' => 'ptsam251@example.com', 'password' => Hash::make('step-SYA-263'), 'role' => 'supplier', 'company_id' => $c263->id]);

        // 264. PT SANCHO TEK INDONESIA
        $c264 = Company::create(['name' => 'PT SANCHO TEK INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SAN-252', 'name' => 'Supplier PT SANCHO TEK INDONESIA', 'email' => 'ptsan252@example.com', 'password' => Hash::make('step-SIA-264'), 'role' => 'supplier', 'company_id' => $c264->id]);

        // 265. PT SANENG INDUSTRIAL
        $c265 = Company::create(['name' => 'PT SANENG INDUSTRIAL', 'description' => 'SUBCONT PLATING']);
        User::create(['username' => 'PT-SAN-253', 'name' => 'Supplier PT SANENG INDUSTRIAL', 'email' => 'ptsan253@example.com', 'password' => Hash::make('step-SAL-265'), 'role' => 'supplier', 'company_id' => $c265->id]);

        // 266. PT SANKO GOSEI TECHNOLOGI INDONESIA
        $c266 = Company::create(['name' => 'PT SANKO GOSEI TECHNOLOGI INDONESIA', 'description' => 'RAW MATERIAL PROD.']);
        User::create(['username' => 'PT-SAN-254', 'name' => 'Supplier PT SANKO GOSEI TECHNOLOGI INDONESIA', 'email' => 'ptsan254@example.com', 'password' => Hash::make('step-SA -266'), 'role' => 'supplier', 'company_id' => $c266->id]);

        // 267. PT SANKO GOSEI TECHNOLOGY INDONESIA
        $c267 = Company::create(['name' => 'PT SANKO GOSEI TECHNOLOGY INDONESIA', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-SAN-255', 'name' => 'Supplier PT SANKO GOSEI TECHNOLOGY INDONESIA', 'email' => 'ptsan255@example.com', 'password' => Hash::make('step-SIA-267'), 'role' => 'supplier', 'company_id' => $c267->id]);

        // 268. PT SANSEI ENGINEERING
        $c268 = Company::create(['name' => 'PT SANSEI ENGINEERING', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SAN-256', 'name' => 'Supplier PT SANSEI ENGINEERING', 'email' => 'ptsan256@example.com', 'password' => Hash::make('step-SNG-268'), 'role' => 'supplier', 'company_id' => $c268->id]);

        // 269. PT SANSYU PRECISION
        $c269 = Company::create(['name' => 'PT SANSYU PRECISION', 'description' => 'CKD']);
        User::create(['username' => 'PT-SAN-257', 'name' => 'Supplier PT SANSYU PRECISION', 'email' => 'ptsan257@example.com', 'password' => Hash::make('step-SON-269'), 'role' => 'supplier', 'company_id' => $c269->id]);

        // 270. PT SANSYU PRECISION INDONESIA
        $c270 = Company::create(['name' => 'PT SANSYU PRECISION INDONESIA', 'description' => 'SPACER & BRIDGE']);
        User::create(['username' => 'PT-SAN-258', 'name' => 'Supplier PT SANSYU PRECISION INDONESIA', 'email' => 'ptsan258@example.com', 'password' => Hash::make('step-SIA-270'), 'role' => 'supplier', 'company_id' => $c270->id]);

        // 271. PT SANYO SPECIAL STEEL INDONESIA
        $c271 = Company::create(['name' => 'PT SANYO SPECIAL STEEL INDONESIA', 'description' => 'CARBON STEEL']);
        User::create(['username' => 'PT-SAN-259', 'name' => 'Supplier PT SANYO SPECIAL STEEL INDONESIA', 'email' => 'ptsan259@example.com', 'password' => Hash::make('step-SIA-271'), 'role' => 'supplier', 'company_id' => $c271->id]);

        // 272. CV SARANA MITRA JAYA
        $c272 = Company::create(['name' => 'CV SARANA MITRA JAYA', 'description' => 'BRASS WIRE, DIAMOND DIE']);
        User::create(['username' => 'CV-SAR-13', 'name' => 'Supplier CV SARANA MITRA JAYA', 'email' => 'cvsar13@example.com', 'password' => Hash::make('step-SYA-272'), 'role' => 'supplier', 'company_id' => $c272->id]);

        // 273. PT SARANA RAPIPAK
        $c273 = Company::create(['name' => 'PT SARANA RAPIPAK', 'description' => 'CHEMICAL BOILER']);
        User::create(['username' => 'PT-SAR-260', 'name' => 'Supplier PT SARANA RAPIPAK', 'email' => 'ptsar260@example.com', 'password' => Hash::make('step-SAK-273'), 'role' => 'supplier', 'company_id' => $c273->id]);

        // 274. PT SATO LABEL SOLUTIONS
        $c274 = Company::create(['name' => 'PT SATO LABEL SOLUTIONS', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SAT-261', 'name' => 'Supplier PT SATO LABEL SOLUTIONS', 'email' => 'ptsat261@example.com', 'password' => Hash::make('step-SNS-274'), 'role' => 'supplier', 'company_id' => $c274->id]);

        // 275. PT SATRIA BUANA LESTARI
        $c275 = Company::create(['name' => 'PT SATRIA BUANA LESTARI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SAT-262', 'name' => 'Supplier PT SATRIA BUANA LESTARI', 'email' => 'ptsat262@example.com', 'password' => Hash::make('step-SRI-275'), 'role' => 'supplier', 'company_id' => $c275->id]);

        // 276. PT SATYA TEHNIK INDONESIA
        $c276 = Company::create(['name' => 'PT SATYA TEHNIK INDONESIA', 'description' => 'SUBCONT DIES']);
        User::create(['username' => 'PT-SAT-263', 'name' => 'Supplier PT SATYA TEHNIK INDONESIA', 'email' => 'ptsat263@example.com', 'password' => Hash::make('step-SIA-276'), 'role' => 'supplier', 'company_id' => $c276->id]);

        // 277. PT SECOM INDONESIA
        $c277 = Company::create(['name' => 'PT SECOM INDONESIA', 'description' => 'SECURITY ALARM']);
        User::create(['username' => 'PT-SEC-264', 'name' => 'Supplier PT SECOM INDONESIA', 'email' => 'ptsec264@example.com', 'password' => Hash::make('step-SIA-277'), 'role' => 'supplier', 'company_id' => $c277->id]);

        // 278. PT SEISHINDO CIPTA ENGINEERING
        $c278 = Company::create(['name' => 'PT SEISHINDO CIPTA ENGINEERING', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SEI-265', 'name' => 'Supplier PT SEISHINDO CIPTA ENGINEERING', 'email' => 'ptsei265@example.com', 'password' => Hash::make('step-SNG-278'), 'role' => 'supplier', 'company_id' => $c278->id]);

        // 279. PT SEJAHTERA PRADIPTA
        $c279 = Company::create(['name' => 'PT SEJAHTERA PRADIPTA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SEJ-266', 'name' => 'Supplier PT SEJAHTERA PRADIPTA', 'email' => 'ptsej266@example.com', 'password' => Hash::make('step-SA -279'), 'role' => 'supplier', 'company_id' => $c279->id]);

        // 280. PT SENJAYA SOODE PRECISION
        $c280 = Company::create(['name' => 'PT SENJAYA SOODE PRECISION', 'description' => 'SUBCONT TREATMENT']);
        User::create(['username' => 'PT-SEN-267', 'name' => 'Supplier PT SENJAYA SOODE PRECISION', 'email' => 'ptsen267@example.com', 'password' => Hash::make('step-SON-280'), 'role' => 'supplier', 'company_id' => $c280->id]);

        // 281. CV SERVATEK ANDALAN
        $c281 = Company::create(['name' => 'CV SERVATEK ANDALAN', 'description' => 'CHECKING FIXTURE']);
        User::create(['username' => 'CV-SER-14', 'name' => 'Supplier CV SERVATEK ANDALAN', 'email' => 'cvser14@example.com', 'password' => Hash::make('step-SN -281'), 'role' => 'supplier', 'company_id' => $c281->id]);

        // 282. PD SETIA JAYA
        $c282 = Company::create(['name' => 'PD SETIA JAYA', 'description' => 'HAND GLOVE, MAJUN, MASKER']);
        User::create(['username' => 'PD-SET-1', 'name' => 'Supplier PD SETIA JAYA', 'email' => 'pdset1@example.com', 'password' => Hash::make('step-SYA-282'), 'role' => 'supplier', 'company_id' => $c282->id]);

        // 283. PT SETSUYO ASTEC
        $c283 = Company::create(['name' => 'PT SETSUYO ASTEC', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SET-268', 'name' => 'Supplier PT SETSUYO ASTEC', 'email' => 'ptset268@example.com', 'password' => Hash::make('step-SEC-283'), 'role' => 'supplier', 'company_id' => $c283->id]);

        // 284. PT SINAR BROMO TEKNIK
        $c284 = Company::create(['name' => 'PT SINAR BROMO TEKNIK', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SIN-269', 'name' => 'Supplier PT SINAR BROMO TEKNIK', 'email' => 'ptsin269@example.com', 'password' => Hash::make('step-SIK-284'), 'role' => 'supplier', 'company_id' => $c284->id]);

        // 285. PT SINAR LESTARI ABADI INDORAYA
        $c285 = Company::create(['name' => 'PT SINAR LESTARI ABADI INDORAYA', 'description' => 'SUBCONT PRESS']);
        User::create(['username' => 'PT-SIN-270', 'name' => 'Supplier PT SINAR LESTARI ABADI INDORAYA', 'email' => 'ptsin270@example.com', 'password' => Hash::make('step-SYA-285'), 'role' => 'supplier', 'company_id' => $c285->id]);

        // 286. PT SINAR MANDIRI GLASS
        $c286 = Company::create(['name' => 'PT SINAR MANDIRI GLASS', 'description' => 'LENS FR ASH']);
        User::create(['username' => 'PT-SIN-271', 'name' => 'Supplier PT SINAR MANDIRI GLASS', 'email' => 'ptsin271@example.com', 'password' => Hash::make('step-SSS-286'), 'role' => 'supplier', 'company_id' => $c286->id]);

        // 287. PT SINAR MUTIARA CAKRABUANA
        $c287 = Company::create(['name' => 'PT SINAR MUTIARA CAKRABUANA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SIN-272', 'name' => 'Supplier PT SINAR MUTIARA CAKRABUANA', 'email' => 'ptsin272@example.com', 'password' => Hash::make('step-SNA-287'), 'role' => 'supplier', 'company_id' => $c287->id]);

        // 288. PT SINAR PUTRA METALINDO
        $c288 = Company::create(['name' => 'PT SINAR PUTRA METALINDO', 'description' => 'RAW MATERIAL DIES']);
        User::create(['username' => 'PT-SIN-273', 'name' => 'Supplier PT SINAR PUTRA METALINDO', 'email' => 'ptsin273@example.com', 'password' => Hash::make('step-SDO-288'), 'role' => 'supplier', 'company_id' => $c288->id]);

        // 289. PT SINAR SOSRO
        $c289 = Company::create(['name' => 'PT SINAR SOSRO', 'description' => 'AIR MINUM']);
        User::create(['username' => 'PT-SIN-274', 'name' => 'Supplier PT SINAR SOSRO', 'email' => 'ptsin274@example.com', 'password' => Hash::make('step-SRO-289'), 'role' => 'supplier', 'company_id' => $c289->id]);

        // 290. PT SINERGI SEMESTA PRATAMA
        $c290 = Company::create(['name' => 'PT SINERGI SEMESTA PRATAMA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SIN-275', 'name' => 'Supplier PT SINERGI SEMESTA PRATAMA', 'email' => 'ptsin275@example.com', 'password' => Hash::make('step-SMA-290'), 'role' => 'supplier', 'company_id' => $c290->id]);

        // 291. PT SINERGI WAHANA GEMILANG
        $c291 = Company::create(['name' => 'PT SINERGI WAHANA GEMILANG', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SIN-276', 'name' => 'Supplier PT SINERGI WAHANA GEMILANG', 'email' => 'ptsin276@example.com', 'password' => Hash::make('step-SNG-291'), 'role' => 'supplier', 'company_id' => $c291->id]);

        // 292. PT SOFTBANK TELECOM INDONESIA
        $c292 = Company::create(['name' => 'PT SOFTBANK TELECOM INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SOF-277', 'name' => 'Supplier PT SOFTBANK TELECOM INDONESIA', 'email' => 'ptsof277@example.com', 'password' => Hash::make('step-SIA-292'), 'role' => 'supplier', 'company_id' => $c292->id]);

        // 293. PT SOMAGEDE INDONESIA
        $c293 = Company::create(['name' => 'PT SOMAGEDE INDONESIA', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-SOM-278', 'name' => 'Supplier PT SOMAGEDE INDONESIA', 'email' => 'ptsom278@example.com', 'password' => Hash::make('step-SIA-293'), 'role' => 'supplier', 'company_id' => $c293->id]);

        // 294. PT STANDARD INDONESIA
        $c294 = Company::create(['name' => 'PT STANDARD INDONESIA', 'description' => 'BENDING PROCESS']);
        User::create(['username' => 'PT-STA-279', 'name' => 'Supplier PT STANDARD INDONESIA', 'email' => 'ptsta279@example.com', 'password' => Hash::make('step-SA -294'), 'role' => 'supplier', 'company_id' => $c294->id]);

        // 295. PT STEEL CENTER INDONESIA
        $c295 = Company::create(['name' => 'PT STEEL CENTER INDONESIA', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-STE-280', 'name' => 'Supplier PT STEEL CENTER INDONESIA', 'email' => 'ptste280@example.com', 'password' => Hash::make('step-SIA-295'), 'role' => 'supplier', 'company_id' => $c295->id]);

        // 296. PT SUGIAKE TOOLING INDONESIA
        $c296 = Company::create(['name' => 'PT SUGIAKE TOOLING INDONESIA', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-SUG-281', 'name' => 'Supplier PT SUGIAKE TOOLING INDONESIA', 'email' => 'ptsug281@example.com', 'password' => Hash::make('step-SIA-296'), 'role' => 'supplier', 'company_id' => $c296->id]);

        // 297. PT SUGIMURA CHEMICAL INDONESIA
        $c297 = Company::create(['name' => 'PT SUGIMURA CHEMICAL INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SUG-282', 'name' => 'Supplier PT SUGIMURA CHEMICAL INDONESIA', 'email' => 'ptsug282@example.com', 'password' => Hash::make('step-SIA-297'), 'role' => 'supplier', 'company_id' => $c297->id]);

        // 298. PT SUGIURA INDONESIA
        $c298 = Company::create(['name' => 'PT SUGIURA INDONESIA', 'description' => 'CKD']);
        User::create(['username' => 'PT-SUG-283', 'name' => 'Supplier PT SUGIURA INDONESIA', 'email' => 'ptsug283@example.com', 'password' => Hash::make('step-SIA-298'), 'role' => 'supplier', 'company_id' => $c298->id]);

        // 299. CV SUMACO KARYA MANDIRI
        $c299 = Company::create(['name' => 'CV SUMACO KARYA MANDIRI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'CV-SUM-15', 'name' => 'Supplier CV SUMACO KARYA MANDIRI', 'email' => 'cvsum15@example.com', 'password' => Hash::make('step-SRI-299'), 'role' => 'supplier', 'company_id' => $c299->id]);

        // 300. CV SUMBER JASA ELECTRO
        $c300 = Company::create(['name' => 'CV SUMBER JASA ELECTRO', 'description' => 'SERVICE AIR CONDITIONER']);
        User::create(['username' => 'CV-SUM-16', 'name' => 'Supplier CV SUMBER JASA ELECTRO', 'email' => 'cvsum16@example.com', 'password' => Hash::make('step-SRO-300'), 'role' => 'supplier', 'company_id' => $c300->id]);

        // 301. PT SUPER SINAR ABADI
        $c301 = Company::create(['name' => 'PT SUPER SINAR ABADI', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-SUP-284', 'name' => 'Supplier PT SUPER SINAR ABADI', 'email' => 'ptsup284@example.com', 'password' => Hash::make('step-SDI-301'), 'role' => 'supplier', 'company_id' => $c301->id]);

        // 302. PT SUPER STEEL CIKARANG
        $c302 = Company::create(['name' => 'PT SUPER STEEL CIKARANG', 'description' => 'STEEL COIL, SHEET']);
        User::create(['username' => 'PT-SUP-285', 'name' => 'Supplier PT SUPER STEEL CIKARANG', 'email' => 'ptsup285@example.com', 'password' => Hash::make('step-SNG-302'), 'role' => 'supplier', 'company_id' => $c302->id]);

        // 303. PT SUPER STEEL INDAH
        $c303 = Company::create(['name' => 'PT SUPER STEEL INDAH', 'description' => 'SLIT COIL, SHEET']);
        User::create(['username' => 'PT-SUP-286', 'name' => 'Supplier PT SUPER STEEL INDAH', 'email' => 'ptsup286@example.com', 'password' => Hash::make('step-SAH-303'), 'role' => 'supplier', 'company_id' => $c303->id]);

        // 304. PT SUPER STEEL KARAWANG
        $c304 = Company::create(['name' => 'PT SUPER STEEL KARAWANG', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-SUP-287', 'name' => 'Supplier PT SUPER STEEL KARAWANG', 'email' => 'ptsup287@example.com', 'password' => Hash::make('step-SNG-304'), 'role' => 'supplier', 'company_id' => $c304->id]);

        // 305. PT SURTEC KARIYA INDONESIA
        $c305 = Company::create(['name' => 'PT SURTEC KARIYA INDONESIA', 'description' => 'SUBCONT PLATING, PAINTING & TREATMENT']);
        User::create(['username' => 'PT-SUR-288', 'name' => 'Supplier PT SURTEC KARIYA INDONESIA', 'email' => 'ptsur288@example.com', 'password' => Hash::make('step-SIA-305'), 'role' => 'supplier', 'company_id' => $c305->id]);

        // 306. PT SURTECKARIYA INDONESIA
        $c306 = Company::create(['name' => 'PT SURTECKARIYA INDONESIA', 'description' => 'SUBCONT']);
        User::create(['username' => 'PT-SUR-289', 'name' => 'Supplier PT SURTECKARIYA INDONESIA', 'email' => 'ptsur289@example.com', 'password' => Hash::make('step-SIA-306'), 'role' => 'supplier', 'company_id' => $c306->id]);

        // 307. PT SURYA TEHNIKA
        $c307 = Company::create(['name' => 'PT SURYA TEHNIKA', 'description' => 'DIES, SPARE PART FOR DIES']);
        User::create(['username' => 'PT-SUR-290', 'name' => 'Supplier PT SURYA TEHNIKA', 'email' => 'ptsur290@example.com', 'password' => Hash::make('step-SKA-307'), 'role' => 'supplier', 'company_id' => $c307->id]);

        // 308. PT SYAJAROTUN NUQUD MUBAROK
        $c308 = Company::create(['name' => 'PT SYAJAROTUN NUQUD MUBAROK', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SYA-291', 'name' => 'Supplier PT SYAJAROTUN NUQUD MUBAROK', 'email' => 'ptsya291@example.com', 'password' => Hash::make('step-SOK-308'), 'role' => 'supplier', 'company_id' => $c308->id]);

        // 309. PT SYNERGI TEKHNIK MANDIRI
        $c309 = Company::create(['name' => 'PT SYNERGI TEKHNIK MANDIRI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-SYN-292', 'name' => 'Supplier PT SYNERGI TEKHNIK MANDIRI', 'email' => 'ptsyn292@example.com', 'password' => Hash::make('step-SRI-309'), 'role' => 'supplier', 'company_id' => $c309->id]);

        // 310. PT TADANO INTERNASIONAL
        $c310 = Company::create(['name' => 'PT TADANO INTERNASIONAL', 'description' => 'COMPUTER, EQUIPMENT & MAINTENANCE']);
        User::create(['username' => 'PT-TAD-293', 'name' => 'Supplier PT TADANO INTERNASIONAL', 'email' => 'pttad293@example.com', 'password' => Hash::make('step-TAL-310'), 'role' => 'supplier', 'company_id' => $c310->id]);

        // 311. PT TAIKISHA MANUFACTURING INDONESIA
        $c311 = Company::create(['name' => 'PT TAIKISHA MANUFACTURING INDONESIA', 'description' => 'SUBCOUNT COATING']);
        User::create(['username' => 'PT-TAI-294', 'name' => 'Supplier PT TAIKISHA MANUFACTURING INDONESIA', 'email' => 'pttai294@example.com', 'password' => Hash::make('step-TIA-311'), 'role' => 'supplier', 'company_id' => $c311->id]);

        // 312. PT TAIYO BERLIAN INDONESIA
        $c312 = Company::create(['name' => 'PT TAIYO BERLIAN INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-TAI-295', 'name' => 'Supplier PT TAIYO BERLIAN INDONESIA', 'email' => 'pttai295@example.com', 'password' => Hash::make('step-TIA-312'), 'role' => 'supplier', 'company_id' => $c312->id]);

        // 313. PT TEJA ARROW
        $c313 = Company::create(['name' => 'PT TEJA ARROW', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-TEJ-296', 'name' => 'Supplier PT TEJA ARROW', 'email' => 'pttej296@example.com', 'password' => Hash::make('step-TOW-313'), 'role' => 'supplier', 'company_id' => $c313->id]);

        // 314. PT TEKADE MITRA INDONESIA
        $c314 = Company::create(['name' => 'PT TEKADE MITRA INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-TEK-297', 'name' => 'Supplier PT TEKADE MITRA INDONESIA', 'email' => 'pttek297@example.com', 'password' => Hash::make('step-TIA-314'), 'role' => 'supplier', 'company_id' => $c314->id]);

        // 315. PT TEKNINDOPURI AMPUH PERKASA
        $c315 = Company::create(['name' => 'PT TEKNINDOPURI AMPUH PERKASA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-TEK-298', 'name' => 'Supplier PT TEKNINDOPURI AMPUH PERKASA', 'email' => 'pttek298@example.com', 'password' => Hash::make('step-TSA-315'), 'role' => 'supplier', 'company_id' => $c315->id]);

        // 316. PT TESAKA INDONESIA
        $c316 = Company::create(['name' => 'PT TESAKA INDONESIA', 'description' => 'RACK COIL']);
        User::create(['username' => 'PT-TES-299', 'name' => 'Supplier PT TESAKA INDONESIA', 'email' => 'pttes299@example.com', 'password' => Hash::make('step-TIA-316'), 'role' => 'supplier', 'company_id' => $c316->id]);

        // 317. PT TETHA ALPHINDO
        $c317 = Company::create(['name' => 'PT TETHA ALPHINDO', 'description' => 'SPARE PART FOR DIES']);
        User::create(['username' => 'PT-TET-300', 'name' => 'Supplier PT TETHA ALPHINDO', 'email' => 'pttet300@example.com', 'password' => Hash::make('step-TO -317'), 'role' => 'supplier', 'company_id' => $c317->id]);

        // 318. CV TIGA SAUDARA CEMERLANG
        $c318 = Company::create(['name' => 'CV TIGA SAUDARA CEMERLANG', 'description' => 'GENERAL TRADING (MAGNET)']);
        User::create(['username' => 'CV-TIG-17', 'name' => 'Supplier CV TIGA SAUDARA CEMERLANG', 'email' => 'cvtig17@example.com', 'password' => Hash::make('step-TNG-318'), 'role' => 'supplier', 'company_id' => $c318->id]);

        // 319. PT TIGA SEJAHTERA TEKNIK
        $c319 = Company::create(['name' => 'PT TIGA SEJAHTERA TEKNIK', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-TIG-301', 'name' => 'Supplier PT TIGA SEJAHTERA TEKNIK', 'email' => 'pttig301@example.com', 'password' => Hash::make('step-TIK-319'), 'role' => 'supplier', 'company_id' => $c319->id]);

        // 320. PT TIMUR MEGAH STEEL
        $c320 = Company::create(['name' => 'PT TIMUR MEGAH STEEL', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-TIM-302', 'name' => 'Supplier PT TIMUR MEGAH STEEL', 'email' => 'pttim302@example.com', 'password' => Hash::make('step-TEL-320'), 'role' => 'supplier', 'company_id' => $c320->id]);

        // 321. PT TMG INTERNATIONAL INDONESIA
        $c321 = Company::create(['name' => 'PT TMG INTERNATIONAL INDONESIA', 'description' => 'CUTTING TOOLS']);
        User::create(['username' => 'PT-TMG-303', 'name' => 'Supplier PT TMG INTERNATIONAL INDONESIA', 'email' => 'pttmg303@example.com', 'password' => Hash::make('step-TIA-321'), 'role' => 'supplier', 'company_id' => $c321->id]);

        // 322. PT TOA PLATING INDONESIA
        $c322 = Company::create(['name' => 'PT TOA PLATING INDONESIA', 'description' => 'SUBCONT PLATING']);
        User::create(['username' => 'PT-TOA-304', 'name' => 'Supplier PT TOA PLATING INDONESIA', 'email' => 'pttoa304@example.com', 'password' => Hash::make('step-TIA-322'), 'role' => 'supplier', 'company_id' => $c322->id]);

        // 323. PT TOKO MOERAH BAGOES
        $c323 = Company::create(['name' => 'PT TOKO MOERAH BAGOES', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-TOK-305', 'name' => 'Supplier PT TOKO MOERAH BAGOES', 'email' => 'pttok305@example.com', 'password' => Hash::make('step-TES-323'), 'role' => 'supplier', 'company_id' => $c323->id]);

        // 324. PT TOOL GIKEN INDONESIA
        $c324 = Company::create(['name' => 'PT TOOL GIKEN INDONESIA', 'description' => 'DIES']);
        User::create(['username' => 'PT-TOO-306', 'name' => 'Supplier PT TOOL GIKEN INDONESIA', 'email' => 'pttoo306@example.com', 'password' => Hash::make('step-TIA-324'), 'role' => 'supplier', 'company_id' => $c324->id]);

        // 325. PT TOOLBOX INDONESIA
        $c325 = Company::create(['name' => 'PT TOOLBOX INDONESIA', 'description' => 'CONSUMABLE DIES']);
        User::create(['username' => 'PT-TOO-307', 'name' => 'Supplier PT TOOLBOX INDONESIA', 'email' => 'pttoo307@example.com', 'password' => Hash::make('step-TIA-325'), 'role' => 'supplier', 'company_id' => $c325->id]);

        // 326. PT TOTAL PRECISION INDONESIA
        $c326 = Company::create(['name' => 'PT TOTAL PRECISION INDONESIA', 'description' => 'PIN']);
        User::create(['username' => 'PT-TOT-308', 'name' => 'Supplier PT TOTAL PRECISION INDONESIA', 'email' => 'pttot308@example.com', 'password' => Hash::make('step-TIA-326'), 'role' => 'supplier', 'company_id' => $c326->id]);

        // 327. PT TOYO BUSINESS ENGINEERING INDONESIA
        $c327 = Company::create(['name' => 'PT TOYO BUSINESS ENGINEERING INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-TOY-309', 'name' => 'Supplier PT TOYO BUSINESS ENGINEERING INDONESIA', 'email' => 'pttoy309@example.com', 'password' => Hash::make('step-TIA-327'), 'role' => 'supplier', 'company_id' => $c327->id]);

        // 328. PT TOYOTA MOTOR MANUFACTURING INDONESIA
        $c328 = Company::create(['name' => 'PT TOYOTA MOTOR MANUFACTURING INDONESIA', 'description' => 'SUBCONT DIES']);
        User::create(['username' => 'PT-TOY-310', 'name' => 'Supplier PT TOYOTA MOTOR MANUFACTURING INDONESIA', 'email' => 'pttoy310@example.com', 'password' => Hash::make('step-TIA-328'), 'role' => 'supplier', 'company_id' => $c328->id]);

        // 329. PT TOYOTA TSUSHO ASIA PACIFIC
        $c329 = Company::create(['name' => 'PT TOYOTA TSUSHO ASIA PACIFIC', 'description' => 'CKD']);
        User::create(['username' => 'PT-TOY-311', 'name' => 'Supplier PT TOYOTA TSUSHO ASIA PACIFIC', 'email' => 'pttoy311@example.com', 'password' => Hash::make('step-TIC-329'), 'role' => 'supplier', 'company_id' => $c329->id]);

        // 330. PT TOYOTA TSUSHO CORPORATION
        $c330 = Company::create(['name' => 'PT TOYOTA TSUSHO CORPORATION', 'description' => 'CKD']);
        User::create(['username' => 'PT-TOY-312', 'name' => 'Supplier PT TOYOTA TSUSHO CORPORATION', 'email' => 'pttoy312@example.com', 'password' => Hash::make('step-TON-330'), 'role' => 'supplier', 'company_id' => $c330->id]);

        // 331. PT TOYOTA TSUSHO INDONESIA
        $c331 = Company::create(['name' => 'PT TOYOTA TSUSHO INDONESIA', 'description' => 'SLIT COIL, SHEET']);
        User::create(['username' => 'PT-TOY-313', 'name' => 'Supplier PT TOYOTA TSUSHO INDONESIA', 'email' => 'pttoy313@example.com', 'password' => Hash::make('step-TIA-331'), 'role' => 'supplier', 'company_id' => $c331->id]);

        // 332. PT TOYOTA TSUSHO LOGISTIC CENTER (TTLC)
        $c332 = Company::create(['name' => 'PT TOYOTA TSUSHO LOGISTIC CENTER (TTLC)', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-TOY-314', 'name' => 'Supplier PT TOYOTA TSUSHO LOGISTIC CENTER (TTLC)', 'email' => 'pttoy314@example.com', 'password' => Hash::make('step-TC)-332'), 'role' => 'supplier', 'company_id' => $c332->id]);

        // 333. PT TOYOTA TSUSHO MECH. &
        $c333 = Company::create(['name' => 'PT TOYOTA TSUSHO MECH. &', 'description' => 'CHECKING FIXTURE & WELDING JIG']);
        User::create(['username' => 'PT-TOY-315', 'name' => 'Supplier PT TOYOTA TSUSHO MECH. &', 'email' => 'pttoy315@example.com', 'password' => Hash::make('step-T &-333'), 'role' => 'supplier', 'company_id' => $c333->id]);

        // 334. PT TRI INTEGRAL ENGINEERING
        $c334 = Company::create(['name' => 'PT TRI INTEGRAL ENGINEERING', 'description' => 'SUBCONT STAMPING']);
        User::create(['username' => 'PT-TRI-316', 'name' => 'Supplier PT TRI INTEGRAL ENGINEERING', 'email' => 'pttri316@example.com', 'password' => Hash::make('step-TNG-334'), 'role' => 'supplier', 'company_id' => $c334->id]);

        // 335. PT TRIYASA BARUNA SAKTI
        $c335 = Company::create(['name' => 'PT TRIYASA BARUNA SAKTI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-TRI-317', 'name' => 'Supplier PT TRIYASA BARUNA SAKTI', 'email' => 'pttri317@example.com', 'password' => Hash::make('step-TTI-335'), 'role' => 'supplier', 'company_id' => $c335->id]);

        // 336. PT TT METALS INDONESIA
        $c336 = Company::create(['name' => 'PT TT METALS INDONESIA', 'description' => 'MATERIAL COIL & SHEET']);
        User::create(['username' => 'PT-TT -318', 'name' => 'Supplier PT TT METALS INDONESIA', 'email' => 'pttt318@example.com', 'password' => Hash::make('step-TIA-336'), 'role' => 'supplier', 'company_id' => $c336->id]);

        // 337. PT UNGGUL SEMESTA
        $c337 = Company::create(['name' => 'PT UNGGUL SEMESTA', 'description' => 'SPARE PART, MACHINE SERVICE']);
        User::create(['username' => 'PT-UNG-319', 'name' => 'Supplier PT UNGGUL SEMESTA', 'email' => 'ptung319@example.com', 'password' => Hash::make('step-UTA-337'), 'role' => 'supplier', 'company_id' => $c337->id]);

        // 338. PT UNGGUL TEKNOS INDONESIA
        $c338 = Company::create(['name' => 'PT UNGGUL TEKNOS INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-UNG-320', 'name' => 'Supplier PT UNGGUL TEKNOS INDONESIA', 'email' => 'ptung320@example.com', 'password' => Hash::make('step-UIA-338'), 'role' => 'supplier', 'company_id' => $c338->id]);

        // 339. PT UNIAIR INDOTAMA CARGO
        $c339 = Company::create(['name' => 'PT UNIAIR INDOTAMA CARGO', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-UNI-321', 'name' => 'Supplier PT UNIAIR INDOTAMA CARGO', 'email' => 'ptuni321@example.com', 'password' => Hash::make('step-UGO-339'), 'role' => 'supplier', 'company_id' => $c339->id]);

        // 340. PT UNITECH INDONESIA
        $c340 = Company::create(['name' => 'PT UNITECH INDONESIA', 'description' => 'FILTER & INDUSTRIAL EQUIPMENT']);
        User::create(['username' => 'PT-UNI-322', 'name' => 'Supplier PT UNITECH INDONESIA', 'email' => 'ptuni322@example.com', 'password' => Hash::make('step-UIA-340'), 'role' => 'supplier', 'company_id' => $c340->id]);

        // 341. PT UNITED STEEL CENTER INDONESIA
        $c341 = Company::create(['name' => 'PT UNITED STEEL CENTER INDONESIA', 'description' => 'RAW MATERIAL PROD.']);
        User::create(['username' => 'PT-UNI-323', 'name' => 'Supplier PT UNITED STEEL CENTER INDONESIA', 'email' => 'ptuni323@example.com', 'password' => Hash::make('step-UIA-341'), 'role' => 'supplier', 'company_id' => $c341->id]);

        // 342. PT UNITED SUPER STEEL
        $c342 = Company::create(['name' => 'PT UNITED SUPER STEEL', 'description' => 'RAW MATERIAL DIES']);
        User::create(['username' => 'PT-UNI-324', 'name' => 'Supplier PT UNITED SUPER STEEL', 'email' => 'ptuni324@example.com', 'password' => Hash::make('step-UEL-342'), 'role' => 'supplier', 'company_id' => $c342->id]);

        // 343. PT UNIVAN INDONESIA
        $c343 = Company::create(['name' => 'PT UNIVAN INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-UNI-325', 'name' => 'Supplier PT UNIVAN INDONESIA', 'email' => 'ptuni325@example.com', 'password' => Hash::make('step-UIA-343'), 'role' => 'supplier', 'company_id' => $c343->id]);

        // 344. PT USAHA GEMILANG
        $c344 = Company::create(['name' => 'PT USAHA GEMILANG', 'description' => 'BAUT, GENERAL SUPPLY']);
        User::create(['username' => 'PT-USA-326', 'name' => 'Supplier PT USAHA GEMILANG', 'email' => 'ptusa326@example.com', 'password' => Hash::make('step-UNG-344'), 'role' => 'supplier', 'company_id' => $c344->id]);

        // 345. PT VARUNI INTAN PURNAMA
        $c345 = Company::create(['name' => 'PT VARUNI INTAN PURNAMA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-VAR-327', 'name' => 'Supplier PT VARUNI INTAN PURNAMA', 'email' => 'ptvar327@example.com', 'password' => Hash::make('step-VMA-345'), 'role' => 'supplier', 'company_id' => $c345->id]);

        // 346. CV VARUNI INTAN PURNAMA
        $c346 = Company::create(['name' => 'CV VARUNI INTAN PURNAMA', 'description' => 'TRADING']);
        User::create(['username' => 'CV-VAR-18', 'name' => 'Supplier CV VARUNI INTAN PURNAMA', 'email' => 'cvvar18@example.com', 'password' => Hash::make('step-V  -346'), 'role' => 'supplier', 'company_id' => $c346->id]);

        // 347. PT Wahana Distribusindo Indonesia
        $c347 = Company::create(['name' => 'PT Wahana Distribusindo Indonesia', 'description' => 'ATK']);
        User::create(['username' => 'PT-Wah-328', 'name' => 'Supplier PT Wahana Distribusindo Indonesia', 'email' => 'ptwah328@example.com', 'password' => Hash::make('step-Wia-347'), 'role' => 'supplier', 'company_id' => $c347->id]);

        // 348. PT WIGUNA ARTHA LESTARI
        $c348 = Company::create(['name' => 'PT WIGUNA ARTHA LESTARI', 'description' => 'WIRE ROPE SLING']);
        User::create(['username' => 'PT-WIG-329', 'name' => 'Supplier PT WIGUNA ARTHA LESTARI', 'email' => 'ptwig329@example.com', 'password' => Hash::make('step-WRI-348'), 'role' => 'supplier', 'company_id' => $c348->id]);

        // 349. PT WINSOME INDONESIA
        $c349 = Company::create(['name' => 'PT WINSOME INDONESIA', 'description' => 'PP PLASTIC PACKAGING']);
        User::create(['username' => 'PT-WIN-330', 'name' => 'Supplier PT WINSOME INDONESIA', 'email' => 'ptwin330@example.com', 'password' => Hash::make('step-WIA-349'), 'role' => 'supplier', 'company_id' => $c349->id]);

        // 350. PT WIRA ADIDAYA PERKASA
        $c350 = Company::create(['name' => 'PT WIRA ADIDAYA PERKASA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-WIR-331', 'name' => 'Supplier PT WIRA ADIDAYA PERKASA', 'email' => 'ptwir331@example.com', 'password' => Hash::make('step-WSA-350'), 'role' => 'supplier', 'company_id' => $c350->id]);

        // 351. PT WONTI INDONESIA
        $c351 = Company::create(['name' => 'PT WONTI INDONESIA', 'description' => 'SUBCONT PLATING']);
        User::create(['username' => 'PT-WON-332', 'name' => 'Supplier PT WONTI INDONESIA', 'email' => 'ptwon332@example.com', 'password' => Hash::make('step-WIA-351'), 'role' => 'supplier', 'company_id' => $c351->id]);

        // 352. PT XAJERIKO ABADI SEJAHTERA
        $c352 = Company::create(['name' => 'PT XAJERIKO ABADI SEJAHTERA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-XAJ-333', 'name' => 'Supplier PT XAJERIKO ABADI SEJAHTERA', 'email' => 'ptxaj333@example.com', 'password' => Hash::make('step-XRA-352'), 'role' => 'supplier', 'company_id' => $c352->id]);

        // 353. PT YABESTINDO MITRA UTAMA
        $c353 = Company::create(['name' => 'PT YABESTINDO MITRA UTAMA', 'description' => 'AIR FILTER, DOUBLE COUNTER AUTOMATION PART']);
        User::create(['username' => 'PT-YAB-334', 'name' => 'Supplier PT YABESTINDO MITRA UTAMA', 'email' => 'ptyab334@example.com', 'password' => Hash::make('step-YMA-353'), 'role' => 'supplier', 'company_id' => $c353->id]);

        // 354. PT YAMANI SPRING INDONESIA
        $c354 = Company::create(['name' => 'PT YAMANI SPRING INDONESIA', 'description' => 'CKD PART']);
        User::create(['username' => 'PT-YAM-335', 'name' => 'Supplier PT YAMANI SPRING INDONESIA', 'email' => 'ptyam335@example.com', 'password' => Hash::make('step-YIA-354'), 'role' => 'supplier', 'company_id' => $c354->id]);

        // 355. PT YAMAZEN INDONESIA
        $c355 = Company::create(['name' => 'PT YAMAZEN INDONESIA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-YAM-336', 'name' => 'Supplier PT YAMAZEN INDONESIA', 'email' => 'ptyam336@example.com', 'password' => Hash::make('step-YIA-355'), 'role' => 'supplier', 'company_id' => $c355->id]);

        // 356. PT YOHZU INDONESIA
        $c356 = Company::create(['name' => 'PT YOHZU INDONESIA', 'description' => 'CKD']);
        User::create(['username' => 'PT-YOH-337', 'name' => 'Supplier PT YOHZU INDONESIA', 'email' => 'ptyoh337@example.com', 'password' => Hash::make('step-YIA-356'), 'role' => 'supplier', 'company_id' => $c356->id]);

        // 357. PT YONTOMO SUKSES ABADI
        $c357 = Company::create(['name' => 'PT YONTOMO SUKSES ABADI', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-YON-338', 'name' => 'Supplier PT YONTOMO SUKSES ABADI', 'email' => 'ptyon338@example.com', 'password' => Hash::make('step-YDI-357'), 'role' => 'supplier', 'company_id' => $c357->id]);

        // 358. PT ZENBI MACHINERY
        $c358 = Company::create(['name' => 'PT ZENBI MACHINERY', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ZEN-339', 'name' => 'Supplier PT ZENBI MACHINERY', 'email' => 'ptzen339@example.com', 'password' => Hash::make('step-ZRY-358'), 'role' => 'supplier', 'company_id' => $c358->id]);

        // 359. PT ZOKKO ANUGERAH PERKASA
        $c359 = Company::create(['name' => 'PT ZOKKO ANUGERAH PERKASA', 'description' => 'CONSUMABLE']);
        User::create(['username' => 'PT-ZOK-340', 'name' => 'Supplier PT ZOKKO ANUGERAH PERKASA', 'email' => 'ptzok340@example.com', 'password' => Hash::make('step-ZSA-359'), 'role' => 'supplier', 'company_id' => $c359->id]);

    }
}