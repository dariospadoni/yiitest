
var strCodFis="";
var strcognome="";
var strnome="";
var strgiornosex="";
var chrcontrollo='';



// Controls/Definitions:
// --------------------------------------------------------------------------
DefaultValues();

// --------------------------------------------------------------------------

// Functions:

// --------------------------------------------------------------------------
// Setta i prodotti ed i valori di default
// --------------------------------------------------------------------------
function DefaultValues()
{
    strCodFis="";
    strcognome="";
    strnome="";
    strgiornosex="";
    chrcontrollo='';

    Cognome = "";
    Nome = "";
    Sesso = 0;
    Comune = "";
    CodiceFiscale = "";
    AnnoCento = 19;
    AnnoDieci = "0";
    AnnoZero = "0";
    Mese = "A";
    Giorno = 1;

    return;
}

function CalcolaMese(mese)
{
    switch (mese){
        case 1: return 'A';
        case 2: return 'B';
        case 3: return 'C';
        case 4: return 'D';
        case 5: return 'E';
        case 6: return 'H';
        case 7: return 'L';
        case 8: return 'M';
        case 9: return 'P';
        case 10: return 'R';
        case 11: return 'S';
        case 12: return 'T';

    }

}

// --------------------------------------------------------------------------
function CalcolaCodiceFiscale(Cognome,Nome,Giorno,AnnoCento,AnnoZero,Mese,Comune,Sesso)
{
    var gs=0;
    var i=0;
    var somma=0;

    strCodFis="";
    strcognome="";
    strnome="";
    strgiornosex="";
    chrcontrollo='';

//    Giorno=parseInt(document.FormCodFis.Giorno.options[document.FormCodFis.Giorno.selectedIndex].value,10);
//    AnnoCento=parseInt(document.FormCodFis.AnnoCento.value,10);
//    AnnoZero=document.FormCodFis.AnnoZero.value;
//    Mese=document.FormCodFis.Mese.options[document.FormCodFis.Mese.selectedIndex].value;
//    Comune=document.FormCodFis.Comune.value;
//    Sesso=parseInt(document.FormCodFis.Sesso.options[document.FormCodFis.Sesso.selectedIndex].value,10);


    // Processa il cognome
    //----------------------------------------------------------------
    Cognome = Cognome.toUpperCase();
    for (i=0; i<Cognome.length; i++)
    {
        switch (Cognome.charAt(i))
        {
            case 'A':
            case 'E':
            case 'I':
            case 'O':
            case 'U': break;
            default :
                if((Cognome.charAt(i)<='Z')&& (Cognome.charAt(i)>'A'))
                    strcognome = strcognome + Cognome.charAt(i);
        }
    }
    if (strcognome.length < 3)
    {
        for (i=0; i<Cognome.length; i++)
        {
            switch (Cognome.charAt(i))
            {
                case 'A':
                case 'E':
                case 'I':
                case 'O':
                case 'U': strcognome = strcognome + Cognome.charAt(i);
            }
        }
        if (strcognome.length < 3)
        {
            for (i=strcognome.length; i<=3; i++)
            { strcognome = strcognome + 'X'; }
        }
    }
    strcognome = strcognome.substring(0,3);
    //------------------------------------------------------------

    // processa il nome
    //----------------------------------------------------------------
    Nome = Nome.toUpperCase();
    for (i=0; i<Nome.length; i++)
    {
        switch (Nome.charAt(i))
        {
            case 'A':
            case 'E':
            case 'I':
            case 'O':
            case 'U': break;
            default:
                if((Nome.charAt(i)<='Z')&& (Nome.charAt(i)>'A'))
                    strnome = strnome + Nome.charAt(i);
        }
    }
    if (strnome.length > 3)
    {
        strnome = strnome.substring(0,1) + strnome.substring(2,4);
    }
    else {
        if (strnome.length < 3)
        {
            for (i=0; i<Nome.length; i++)
            {
                switch (Nome.charAt(i))
                {
                    case 'A':
                    case 'E':
                    case 'I':
                    case 'O':
                    case 'U': strnome = strnome + Nome.charAt(i);
                }
            }
            if (strnome.length < 3)
            {
                for (i=strnome.length; i<=3; i++)
                {strnome = strnome + 'X';}
            }
        }
        strnome = strnome.substring(0,3);
    }
    //--------------------------------------- Fine processa nome




    // processa giorno e sesso
    //--------------------------------------------
    gs = Giorno + (40 * Sesso);
    if(gs<10) strgiornosex = "0" + gs;
    else strgiornosex =  gs;
    //--------------------------------------------

    strCodFis = strcognome + strnome + AnnoZero + CalcolaMese( Mese ) + strgiornosex + Comune;

    // calcola la cifra di controllo
    //--------------------------------------------
    for (i=0; i<15; i++)
    {
        if (((i+1) % 2) != 0) //caratteri dispari
        {
            switch (strCodFis.charAt(i))
            {
                case '0':
                case 'A':{ somma += 1; break;}
                case '1':
                case 'B':{ somma += 0; break;}
                case '2':
                case 'C':{ somma += 5; break;}
                case '3':
                case 'D':{ somma += 7; break;}
                case '4':
                case 'E':{ somma += 9; break;}
                case '5':
                case 'F':{ somma += 13; break;}
                case '6':
                case 'G':{ somma += 15; break;}
                case '7':
                case 'H':{ somma += 17; break;}
                case '8':
                case 'I':{ somma += 19; break;}
                case '9':
                case 'J':{ somma += 21; break;}
                case 'K':{ somma += 2; break;}
                case 'L':{ somma += 4; break;}
                case 'M':{ somma += 18; break;}
                case 'N':{ somma += 20; break;}
                case 'O':{ somma += 11; break;}
                case 'P':{ somma += 3; break;}
                case 'Q':{ somma += 6; break;}
                case 'R':{ somma += 8; break;}
                case 'S':{ somma += 12; break;}
                case 'T':{ somma += 14; break;}
                case 'U':{ somma += 16; break;}
                case 'V':{ somma += 10; break;}
                case 'W':{ somma += 22; break;}
                case 'X':{ somma += 25; break;}
                case 'Y':{ somma += 24; break;}
                case 'Z':{ somma += 23; break;}
            }
        }
        else //caratteri pari
        {
            switch (strCodFis.charAt(i))
            {
                case '0':
                case 'A':{ somma += 0; break;}
                case '1':
                case 'B':{ somma += 1; break;}
                case '2':
                case 'C':{ somma += 2; break;}
                case '3':
                case 'D':{ somma += 3; break;}
                case '4':
                case 'E':{ somma += 4; break;}
                case '5':
                case 'F':{ somma += 5; break;}
                case '6':
                case 'G':{ somma += 6; break;}
                case '7':
                case 'H':{ somma += 7; break;}
                case '8':
                case 'I':{ somma += 8; break;}
                case '9':
                case 'J':{ somma += 9; break;}
                case 'K':{ somma += 10; break;}
                case 'L':{ somma += 11; break;}
                case 'M':{ somma += 12; break;}
                case 'N':{ somma += 13; break;}
                case 'O':{ somma += 14; break;}
                case 'P':{ somma += 15; break;}
                case 'Q':{ somma += 16; break;}
                case 'R':{ somma += 17; break;}
                case 'S':{ somma += 18; break;}
                case 'T':{ somma += 19; break;}
                case 'U':{ somma += 20; break;}
                case 'V':{ somma += 21; break;}
                case 'W':{ somma += 22; break;}
                case 'X':{ somma += 23; break;}
                case 'Y':{ somma += 24; break;}
                case 'Z':{ somma += 25; break;}
            }
        }
    }
    somma %= 26;
    switch (somma)
    {
        case 0: {chrcontrollo='A'; break;}
        case 1: {chrcontrollo='B'; break;}
        case 2: {chrcontrollo='C'; break;}
        case 3: {chrcontrollo='D'; break;}
        case 4: {chrcontrollo='E'; break;}
        case 5: {chrcontrollo='F'; break;}
        case 6: {chrcontrollo='G'; break;}
        case 7: {chrcontrollo='H'; break;}
        case 8: {chrcontrollo='I'; break;}
        case 9: {chrcontrollo='J'; break;}
        case 10: {chrcontrollo='K'; break;}
        case 11: {chrcontrollo='L'; break;}
        case 12: {chrcontrollo='M'; break;}
        case 13: {chrcontrollo='N'; break;}
        case 14: {chrcontrollo='O'; break;}
        case 15: {chrcontrollo='P'; break;}
        case 16: {chrcontrollo='Q'; break;}
        case 17: {chrcontrollo='R'; break;}
        case 18: {chrcontrollo='S'; break;}
        case 19: {chrcontrollo='T'; break;}
        case 20: {chrcontrollo='U'; break;}
        case 21: {chrcontrollo='V'; break;}
        case 22: {chrcontrollo='W'; break;}
        case 23: {chrcontrollo='X'; break;}
        case 24: {chrcontrollo='Y'; break;}
        case 25: {chrcontrollo='Z'; break;}
    }
    //--------------------------------------------

    return strCodFis + chrcontrollo;



}

// --------------------------------------------------------------------------
//  END OF SCRIPT
// --------------------------------------------------------------------------

