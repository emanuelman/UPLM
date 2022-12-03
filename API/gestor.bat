@echo off

rem EQU - igual
rem NEQ - diferente
rem LSS - menor que
rem LEQ - menor que ou igual
rem GTR - maior que
rem GEQ - maior que ou igual

echo.
echo -------------------------------
echo              UPLM
echo -------------------------------
echo.
echo.
echo Linguagens de Programacao Disponiveis:
echo.
echo --Go
echo.
echo --Java
echo.
echo.--Python
echo.

set "opcao=default"
set /p opcao=Inputs: 

rem *comando: help*

if "%opcao%" equ "help" start help.bat

rem versoes das linguagens disponiveis para instalar

if "%opcao%" equ "list --Go" start listGo.bat

if "%opcao%" equ "list --Java" start listJava.bat

if "%opcao%" equ "list --Python" start listPython.bat

rem instalação das linguagens de programacao

if "%opcao%" equ "install --Go13" start installGo13.bat

if "%opcao%" equ "install --Go19" start installGo19.bat

if "%opcao%" equ "install --Java7" start installJava7.bat

if "%opcao%" equ "install --Java8" start installJava8.bat

if "%opcao%" equ "install --Python9" start installPython9.bat

if "%opcao%" equ "install --Python10" start installPython10.bat

rem sair do programa

if %opcao% equ "exit" exit
