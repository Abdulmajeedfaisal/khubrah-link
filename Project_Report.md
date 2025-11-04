Kingdom OF Saudi Arabia

Ministry Of Education

Albaha University

Faculty of Computing & Information

Department Of Systems and Networks

<span dir="rtl">المملكة العربية السعودية</span>

<span dir="rtl">وزارة التعليم</span>

<span dir="rtl">جامعة الباحة</span>

<span dir="rtl">كلية الحاسبات والمعلومات</span>

<span dir="rtl">قسم النظم والشبكات</span>

**Final Year Project Report**

**Senior Project for CIS 1**

**CRN:** 32238

**Design and Development of Khubrah-Link: A Community-Based Peer-to-Peer
Learning Platform**

**Submitted by**

Abdul Wahab Ahmed Abdullah AL-Suhaimi (443036955)

Musaad Hussin Musaad AL-Shamrani (444027667)

Muhannad AHMAD Hassan Al-Zahrani (444027702)

Sultan Khalid Abdullrahim Alzahrani (444025350)

Rayan Ahmed Abdullah Al-Zahrani (444015731)

*Supervisor by*

Dr. Mufrah Waqddani

<span id="_Toc205079970" class="anchor"></span>ABSTRACT

……

<span id="_Toc205079971"
class="anchor"></span>**<span dir="rtl">الملخص</span>**

<span dir="rtl">.....</span>

<span id="_Toc205079973" class="anchor"></span>DEDICATION

…..

<span id="_Toc205079974" class="anchor"></span>ACKNOWLEDGMENTS

….

<span id="_Toc212095392" class="anchor"></span>TABLE OF CONTENTS

[ABSTRACT <span dir="rtl"></span>[I](#_Toc205079970)](#_Toc205079970)

[<span dir="rtl">الملخص</span> [II](#_Toc205079971)](#_Toc205079971)

[DEDICATION
<span dir="rtl"></span>[III](#_Toc205079973)](#_Toc205079973)

[ACKNOWLEDGMENTS
<span dir="rtl"></span>[IV](#_Toc205079974)](#_Toc205079974)

[TABLE OF CONTENTS
<span dir="rtl"></span>[V](#_Toc212095392)](#_Toc212095392)

[LIST OF FIGURES
<span dir="rtl"></span>[VII](#_Toc205079978)](#_Toc205079978)

[LIST OF TABLES
<span dir="rtl"></span>[VIII](#_Toc205079979)](#_Toc205079979)

[LIST OF ABBREVIATIONS
<span dir="rtl"></span>[IX](#_Toc205079980)](#_Toc205079980)

[CHAPTER 1: DATA COLLECTION AND PLANNING OF THE SYSTEM
<span dir="rtl"></span>[1](#data-collection-and-planning-of-the-system)](#data-collection-and-planning-of-the-system)

[1.1 Introduction
<span dir="rtl"></span>[1](#introduction)](#introduction)

[1.2 Problem Statement
<span dir="rtl"></span>[1](#problem-statement)](#problem-statement)

[1.3 Project Goals and Objectives
<span dir="rtl"></span>[2](#project-goals-and-objectives)](#project-goals-and-objectives)

[1.4 The Solution
<span dir="rtl"></span>[3](#the-solution)](#the-solution)

[1.5 Project Scope
<span dir="rtl"></span>[4](#project-scope)](#project-scope)

[1.6 System Functionality
<span dir="rtl"></span>[5](#system-functionality)](#system-functionality)

[1.7 The Stakeholders, Their Relevance and Role in the Developed Project
<span dir="rtl"></span>[6](#the-stakeholders-their-relevance-and-role-in-the-developed-project)](#the-stakeholders-their-relevance-and-role-in-the-developed-project)

[1.8 The Existing Similar Works with their Advantages and Limitations
<span dir="rtl"></span>[8](#the-existing-similar-works-with-their-advantages-and-limitations)](#the-existing-similar-works-with-their-advantages-and-limitations)

[1.9 Gantt Chart of the Project
<span dir="rtl"></span>[9](#gantt-chart-of-the-project)](#gantt-chart-of-the-project)

[CHAPTER 2: BACKGROUND OF THE OLD SYSTEM
<span dir="rtl"></span>[12](#background-of-the-old-system)](#background-of-the-old-system)

[2.1 Background <span dir="rtl"></span>[12](#background)](#background)

[2.2 Old System Overview
<span dir="rtl"></span>[12](#old-system-overview)](#old-system-overview)

[2.3 Previous Studies
<span dir="rtl"></span>[14](#previous-studies)](#previous-studies)

[2.4 Chapter Conclusion
<span dir="rtl"></span>[18](#chapter-conclusion)](#chapter-conclusion)

[CHAPTER 3: ANALYSIS AND METHODOLOGY
<span dir="rtl"></span>[20](#analysis-and-methodology)](#analysis-and-methodology)

[3.1 Overview <span dir="rtl"></span>[20](#overview)](#overview)

[3.2 Development Methodology
<span dir="rtl"></span>[20](#development-methodology)](#development-methodology)

[3.3 Requirements Gathering Techniques
<span dir="rtl"></span>[22](#requirements-gathering-techniques)](#requirements-gathering-techniques)

[3.4 System Requirements Specification
<span dir="rtl"></span>[25](#system-requirements-specification)](#system-requirements-specification)

[3.4.1 Functional Requirements
<span dir="rtl"></span>[25](#functional-requirements)](#functional-requirements)

[3.4.2 Non-Functional Requirements
<span dir="rtl"></span>[28](#non-functional-requirements)](#non-functional-requirements)

[3.5 System Modeling
<span dir="rtl"></span>[31](#system-modeling)](#system-modeling)

[3.5.1 Use Case Diagram
<span dir="rtl"></span>[31](#use-case-diagram)](#use-case-diagram)

[3.5.2 Entity-Relationship (ER) Diagram
<span dir="rtl"></span>[37](#entity-relationship-er-diagram)](#entity-relationship-er-diagram)

[3.6 Chapter Conclusion
<span dir="rtl"></span>[39](#chapter-conclusion-1)](#chapter-conclusion-1)

[CHAPTER 4: SYSTEM DESIGN
<span dir="rtl"></span>[41](#system-design)](#system-design)

[4.1 Overview <span dir="rtl"></span>[41](#overview-1)](#overview-1)

[4.2 System Architecture
<span dir="rtl"></span>[42](#system-architecture)](#system-architecture)

[4.3 Database Design
<span dir="rtl"></span>[47](#database-design)](#database-design)

[4.3.1 Database Tables
<span dir="rtl"></span>[47](#database-tables)](#database-tables)

[4.3.2 Database Relationships Schema
<span dir="rtl"></span>[54](#database-relationships-schema)](#database-relationships-schema)

[4.4 UML Design Diagrams
<span dir="rtl"></span>[58](#uml-design-diagrams)](#uml-design-diagrams)

[4.4.1 Sequence Diagrams
<span dir="rtl"></span>[58](#sequence-diagrams)](#sequence-diagrams)

[4.4.2 Class Diagram
<span dir="rtl"></span>[63](#class-diagram)](#class-diagram)

[CHAPTER 5: SYSTEM IMPLEMENTATION
<span dir="rtl"></span>[66](#system-implementation)](#system-implementation)

[5.1 Overview <span dir="rtl"></span>[66](#overview-2)](#overview-2)

[CHAPTER 6: SYSTEM INTERFACES
<span dir="rtl"></span>[68](#system-interfaces)](#system-interfaces)

[6.1 Overview <span dir="rtl"></span>[68](#overview-3)](#overview-3)

[CHAPTER 7: TESTING AND DEPLOYMENT
<span dir="rtl"></span>[70](#testing-and-deployment)](#testing-and-deployment)

[7.1 Overview <span dir="rtl"></span>[70](#overview-4)](#overview-4)

[CONCLUSION <span dir="rtl"></span>[71](#_Toc205080079)](#_Toc205080079)

[REFERENCES <span dir="rtl"></span>[72](#_Toc212095438)](#_Toc212095438)

<span id="_Toc205079978" class="anchor"></span>

LIST OF FIGURES

[Figure ‎1.1: Gantt Chart for the Khubrah-Link Project
<span dir="rtl"></span>[9](#_Toc212095364)](file:///C:\Users\Majeed_Alhaidari\Desktop\Final_Projrct_Khubrah-Link_platform\Final%20Year%20Project%20Report.docx#_Toc212095364)

[Figure ‎3.1: Use Case Diagram for Khubrah-Link
<span dir="rtl"></span>[32](#_Toc212095365)](file:///C:\Users\Majeed_Alhaidari\Desktop\Final_Projrct_Khubrah-Link_platform\Final%20Year%20Project%20Report.docx#_Toc212095365)

[Figure ‎3.2: Entity-Relationship Diagram for Khubrah-Link Platform
<span dir="rtl"></span>[38](#_Toc212095366)](file:///C:\Users\Majeed_Alhaidari\Desktop\Final_Projrct_Khubrah-Link_platform\Final%20Year%20Project%20Report.docx#_Toc212095366)

[Figure ‎4.1: User Registration Process
<span dir="rtl"></span>[59](#_Toc212095367)](file:///C:\Users\Majeed_Alhaidari\Desktop\Final_Projrct_Khubrah-Link_platform\Final%20Year%20Project%20Report.docx#_Toc212095367)

[Figure ‎4.2: Search for Skill Providers
<span dir="rtl"></span>[60](#_Toc212095368)](file:///C:\Users\Majeed_Alhaidari\Desktop\Final_Projrct_Khubrah-Link_platform\Final%20Year%20Project%20Report.docx#_Toc212095368)

[Figure ‎4.3: Session Booking Request
<span dir="rtl"></span>[61](#_Toc212095369)](file:///C:\Users\Majeed_Alhaidari\Desktop\Final_Projrct_Khubrah-Link_platform\Final%20Year%20Project%20Report.docx#_Toc212095369)

[Figure ‎4.4: Submit Review
<span dir="rtl"></span>[62](#_Toc212095370)](file:///C:\Users\Majeed_Alhaidari\Desktop\Final_Projrct_Khubrah-Link_platform\Final%20Year%20Project%20Report.docx#_Toc212095370)

[Figure ‎4.5: Class Diagram for Khubrah-Link System
<span dir="rtl"></span>[63](#_Toc212095371)](file:///C:\Users\Majeed_Alhaidari\Desktop\Final_Projrct_Khubrah-Link_platform\Final%20Year%20Project%20Report.docx#_Toc212095371)

<span id="_Toc205079979" class="anchor"></span>LIST OF TABLES

[Table ‎4.1: Users Table Structure
<span dir="rtl"></span>[47](#_Toc211410423)](#_Toc211410423)

[Table ‎4.2: Skills Table Structure
<span dir="rtl"></span>[48](#_Toc211410424)](#_Toc211410424)

[Table ‎4.3: User_Skills Table Structure
<span dir="rtl"></span>[49](#_Toc211410425)](#_Toc211410425)

[Table ‎4.4: Sessions Table Structure
<span dir="rtl"></span>[50](#_Toc211410426)](#_Toc211410426)

[Table ‎4.5: Reviews Table Structure
<span dir="rtl"></span>[51](#_Toc211410427)](#_Toc211410427)

[Table ‎4.6: Messages Table Structure
<span dir="rtl"></span>[52](#_Toc211410428)](#_Toc211410428)

[Table ‎4.7: Administrators Table Structure
<span dir="rtl"></span>[53](#_Toc211410429)](#_Toc211410429)

[Table ‎4.8: Reported_Content Table Structure
<span dir="rtl"></span>[53](#_Toc211410430)](#_Toc211410430)

<span id="_Toc205079980" class="anchor"></span>LIST OF ABBREVIATIONS

***Chapter 1***

# DATA COLLECTION AND PLANNING OF THE SYSTEM

## Introduction

The contemporary global economy is experiencing a significant paradigm
shift, driven by digitalization and the rise of the sharing economy,
where access to assets and skills is often valued over direct ownership
(Botsman & Rogers, 2010). In this evolving landscape, continuous
learning and practical skill acquisition have become imperative for
personal and professional development. While large-scale Massive Open
Online Courses (MOOCs) have democratized access to knowledge on a global
level, their effectiveness can be limited by low completion rates and a
lack of personalized feedback (Kaplan & Haenlein, 2016). Consequently, a
distinct and often overlooked gap persists within the local community
ecosystem. A wealth of practical knowledge, specialized skills, and
hands-on expertise resides within our communities, yet it remains
largely fragmented and inaccessible.

The primary challenge lies in the absence of a dedicated, trusted, and
efficient mechanism to connect individuals who possess these skills with
those who seek to learn them. Informal methods such as social media
groups or word-of-mouth referrals are often unreliable and lack the
necessary structure for verification, scheduling, and building a
reputation-based community.

This project, titled " Khubrah-link," is designed to address this
critical gap. It proposes the development of a peer-to-peer
skill-sharing platform that functions as a community-centric digital
marketplace. The system's core purpose is to provide the infrastructure
for knowledge providers and knowledge seekers within the same
geographical area to discover each other, communicate, and arrange
learning sessions in a secure and organized environment. This document
outlines the comprehensive process of data collection, planning,
analysis, design, implementation, and testing of the proposed
Khubrah-link platform.

## Problem Statement

The initiative for this project stems from a set of interconnected
problems that hinder the effective transfer of skills and knowledge at
the local level. The absence of a formalized platform creates
significant inefficiencies and barriers for both learners and experts.
The principal problems to be addressed are as follows:

1.  **Fragmentation and Inaccessibility of Local Expertise:** Skilled
    professionals, experienced hobbyists, and knowledgeable individuals
    are dispersed throughout the community with no central hub to
    register their expertise. Consequently, those in need of specific
    practical skills have no reliable or efficient method to identify
    and connect with these local experts, a challenge common in offline,
    peer-to-peer service markets.

2.  **High Cost and Inflexibility of Formal Training:** Traditional
    alternatives for skill development, such as professional training
    centers or workshops, are often characterized by high costs, rigid
    schedules, and standardized curricula. This model excludes a large
    segment of potential learners seeking affordable, flexible, and
    personalized instruction on niche or specific practical skills.

3.  **Lack of a Trusted and Secure Environment:** Trust is a
    foundational element for the success of any online marketplace or
    peer-to-peer platform (Gefen et al., 2003). Informal channels like
    social media platforms or classified ads, which are currently used
    as imperfect substitutes, are fraught with risks. They offer no
    mechanism for user verification, a structured reputation system
    (e.g., reviews and ratings), or accountability, leading to a high
    potential for low-quality instruction, fraud, and security concerns
    for users.

4.  **Underutilization of Community Talent:** A significant reservoir of
    valuable skills within the community remains dormant and
    unmonetized. Individuals capable of teaching and mentoring lack a
    straightforward and accessible platform to offer their services,
    limiting their ability to generate supplementary income and
    contribute to the community's collective skill development.

## Project Goals and Objectives

The primary goal of the Khubrah-link project is to design, develop, and
deploy a robust and user-friendly peer-to-peer platform that effectively
facilitates skill sharing and knowledge transfer within local
communities. To achieve this overarching goal, the project is broken
down into the following specific, measurable objectives:

1.  **To analyze and specify the system requirements** for a
    peer-to-peer skill-sharing platform and to design a scalable system
    architecture, a normalized database schema, and an intuitive user
    interface.

2.  **To develop the core functionalities of the platform**, including a
    secure user registration and profile management system, a
    comprehensive search engine with advanced filtering capabilities, an
    integrated real-time messaging system, and a module for scheduling
    learning sessions.

3.  **To establish a community-driven trust mechanism** through the
    implementation of a mandatory, two-way review and rating system that
    allows both the knowledge provider and seeker to evaluate each other
    after a scheduled session.

4.  **To create an intuitive and accessible User Interface (UI) and User
    Experience (UX)** design that ensures ease of navigation for
    non-technical users, thereby encouraging high rates of adoption and
    sustained engagement.

5.  **To conduct rigorous testing of the system**—including unit,
    integration, and user acceptance testing—to identify and resolve
    defects, ensuring the platform is stable, secure, and reliable for
    deployment.

## The Solution

The proposed solution to the problems identified in section 1.2 is the
development of a centralized web-based platform, " Khubrah-link". This
platform will function as a dedicated digital facilitator, providing the
necessary tools and environment to bridge the gap between local
individuals possessing valuable skills and those who wish to acquire
them. The system is designed to directly address each of the identified
problems through its core features and operational model.

To counter the fragmentation of local expertise, the platform will
provide a structured and searchable repository. Skill providers can
create detailed, verified profiles highlighting their expertise,
availability, and preferred mode of teaching (in-person or online). This
transforms a scattered, informal network into a centralized and easily
accessible community resource.

The solution addresses the high cost and inflexibility of formal
training by enabling a direct peer-to-peer model. This empowers users to
bypass traditional institutional overhead, allowing for more affordable
and personalized learning experiences. The platform’s scheduling feature
provides the flexibility for users to arrange sessions at mutually
convenient times, accommodating diverse schedules and learning paces.
Financial arrangements, if any, are agreed upon directly by the users,
promoting a range of options from paid tuition to voluntary skill-swaps.

To mitigate the lack of trust inherent in informal channels,
Khubrah-link will implement a robust reputation system. While the
platform does not process payments, it builds trust through other means.
Key features include email verification for all users and, most
importantly, a mandatory two-way review system. After a session is
marked as complete in the system's scheduler, both participants are
prompted to rate and review each other. This transparency creates a
self-regulating community where reputation, built on verifiable user
feedback, serves as a primary form of social capital and a reliable
indicator of quality and trustworthiness (Luo et al., 2015).

Finally, the platform directly empowers the underutilized talent within
the community by providing a dedicated, no-cost channel to showcase
skills. It lowers the barrier to entry for individuals to become
micro-entrepreneurs or community mentors, providing them with the
visibility and tools needed to connect with an audience of learners.

## Project Scope

The scope of this project is carefully defined to ensure the delivery of
a functional and robust core platform within the timeframe of the
project. The boundaries are delineated by what is included (In-Scope)
and what is explicitly excluded (Out-of-Scope).

**In-Scope:**

- **User Account Management:** The system will provide functionality for
  user registration, secure authentication (login/logout), and
  comprehensive profile management, allowing users to define themselves
  as skill providers, learners, or both.

- **Core Platform Features:** Development will focus on the essential
  features for platform operation: a dynamic search engine with filters
  (by skill, location, availability), a real-time private messaging
  system for user communication, and an integrated scheduling module for
  booking and managing learning sessions.

- **Reputation and Trust System:** The project includes the
  implementation of a two-way rating and review system that is activated
  after a session is completed, forming the core of the community-driven
  trust mechanism.

- **Web-Based Application:** The solution will be developed as a
  responsive web application, ensuring accessibility across standard
  desktop and mobile web browsers.

- **Administrative Backend:** A basic administrative dashboard will be
  created for system oversight, including user management and content
  moderation capabilities.

**Out-of-Scope:**

- **Integrated Payment Gateway:** The processing of financial
  transactions between users is explicitly out of scope. The platform
  will facilitate the connection, but any monetary exchange must be
  arranged independently by the users.

- **Native Mobile Applications:** The development of dedicated,
  installable applications for iOS or Android operating systems is not
  included in this project phase.

- **Advanced Session Features:** Functionalities such as integrated live
  video streaming for online sessions, management of group classes or
  workshops, and the creation of multi-part courses are considered
  future enhancements.

- **Official Certification and Vetting:** The platform will not provide
  any form of official accreditation or certificates for completed
  sessions. Furthermore, the system will not perform manual vetting or
  quality checks on the skills offered by providers; this is left to the
  community-driven review system.

## System Functionality

The Khubrah-link platform is designed to serve three primary user roles:
the General User (unregistered visitor), the Registered User
(encompassing both Learners and Skill Providers), and the Administrator.
The high-level functionalities available to each role are outlined
below.

**General User Functionality:**

- Browse and explore the range of skills and services offered on the
  platform.

- Utilize the search and filter functionalities to find local skill
  providers.

- View the public profiles of skill providers, including their skill
  descriptions, ratings, and reviews from other users.

- Access static informational pages such as "About Us," "How It Works,"
  and "FAQ."

**Registered User (Learner/Provider) Functionality:**

- Includes all functionalities available to the General User.

- Secure account creation and authentication (login/logout).

- Create, edit, and manage a detailed user profile, with distinct
  sections for "Skills I Can Teach" and "Skills I Want to Learn."

- Initiate and participate in private, real-time conversations with
  other users via the messaging system to discuss session details.

- Send, receive, accept, or decline session booking requests through the
  integrated scheduling calendar.

- Submit and view detailed ratings and reviews for other users upon the
  completion of a scheduled session.

**Administrator Functionality:**

- A secure backend interface for system management.

- Full oversight of the user database, including the ability to manage
  user accounts (e.g., suspend or delete accounts that violate terms of
  service).

- Content moderation capabilities, allowing for the review and removal
  of inappropriate profile information, listings, or user reviews.

- Access to a basic analytics dashboard displaying key system metrics,
  such as total number of users, number of skills listed, and total
  sessions booked.

## The Stakeholders, Their Relevance and Role in the Developed Project

A stakeholder is any individual, group, or organization that has an
interest in, or may be affected by, the project's execution and
outcomes. Identifying these stakeholders is crucial for understanding
the system's requirements and ensuring its success. The primary
stakeholders for the Khubrah-link platform are identified below.

- **Skill Providers (Experts/Tutors):**

  - **Relevance:** They are the core value creators of the platform. The
    quantity, quality, and diversity of skills offered are entirely
    dependent on their participation. They represent the "supply" side
    of this two-sided marketplace.

  - **Role:** Their role is to create compelling and accurate profiles,
    list the skills they can teach, respond to inquiries from learners
    in a timely manner, conduct the learning sessions, and provide
    feedback on learners to enrich the community's reputation system.

- **Skill Seekers (Learners):**

  - **Relevance:** As the primary consumers, they represent the "demand"
    side. Their active engagement, search for skills, and session
    bookings drive the platform's activity and validate its core
    purpose.

  - **Role:** Their role is to search for and identify suitable skill
    providers, initiate communication, book sessions, and actively
    participate in the learning process. Critically, they must provide
    honest ratings and reviews post-session to help maintain the
    integrity and quality of the platform.

- **The Project Development Team (Student Developers):**

  - **Relevance:** This team is responsible for the successful
    translation of the project idea into a functional, well-documented
    software artifact that meets all specified academic and functional
    requirements.

  - **Role:** The team's role involves the complete Systems Development
    Life Cycle (SDLC), including requirements analysis, system design,
    software development, rigorous testing, and the preparation of all
    necessary documentation.

- **Academic Supervisors:**

  - **Relevance:** They are responsible for ensuring that the project
    adheres to the academic standards and learning objectives set by the
    institution. Their approval is essential for the project's
    successful completion.

  - **Role:** Their role is to provide expert guidance, monitor
    progress, offer constructive feedback throughout the development
    lifecycle, and ultimately evaluate the final product and its
    documentation.

- **System Administrator:**

  - **Relevance:** This stakeholder is vital for the long-term
    operational integrity, safety, and health of the platform once it is
    deployed.

  - **Role:** The administrator's role includes managing the user base,
    moderating platform content to ensure it complies with community
    guidelines, addressing user-reported issues, and ensuring the smooth
    technical operation of the system.

##  The Existing Similar Works with their Advantages and Limitations 

A thorough analysis of the existing landscape is necessary to identify
market gaps and establish the unique value proposition of the proposed
system. Similar works can be grouped into three main categories: Global
E-Learning Platforms, Niche Skill-Sharing Platforms, and Informal Local
Channels.

1.  **Global E-Learning Platforms (e.g., Coursera, Udemy):**

    - **Advantages:** These platforms offer a vast library of
      high-quality, structured courses from universities and industry
      experts. They provide a formal learning path, often with
      certification, and have a global reach.

    - **Limitations:** Their primary limitations are a lack of
      personalization and local context. The learning experience is
      typically one-to-many and pre-recorded, offering little to no
      direct, one-on-one mentorship. Furthermore, they do not cater to
      practical, hands-on skills that require in-person guidance (Kaplan
      & Haenlein, 2016).

2.  **Niche Skill-Sharing Platforms (e.g., Skillshare):**

    - **Advantages:** Skillshare focuses more on creative and practical
      skills through project-based classes. It fosters a community of
      creators and offers a more hands-on approach than traditional
      MOOCs.

    - **Limitations:** The model is still primarily based on
      pre-recorded video content and is not designed for arranging live,
      one-on-one sessions, whether online or in-person. Its focus is
      global rather than community-centric, and it does not address the
      need for finding a local mentor.

3.  **Informal Local Channels (e.g., Facebook Groups, Classifieds):**

    - **Advantages:** These channels are free to use, have a large
      existing user base, and are inherently local. They offer a direct
      way for people to post requests or offers for services.

    - **Limitations:** They suffer from a critical lack of structure and
      trust. There are no dedicated search functions, scheduling tools,
      or reputation systems. This informal nature makes transactions
      risky and inefficient, as there is no mechanism to verify the
      credibility of a provider or hold either party accountable (Gefen
      et al., 2003).

**The Proposed Idea**

The analysis of existing works reveals a clear market gap for a solution
that combines the trust and structure of formal platforms with the
locality and flexibility of informal channels. The proposed idea,
Khubrah-link, is designed to fill this specific niche.

Khubrah-link differentiates itself by focusing on being a hyperlocal
facilitator for one-on-one learning. Unlike global platforms, its core
mission is to connect people within the same community. Unlike informal
channels, it provides the essential "trust infrastructure"—verified
profiles, a robust review system, and integrated communication and
scheduling tools—that is necessary for peer-to-peer interactions to
flourish (Hamari et al., 2016). The platform is not intended to compete
with formal online courses but to complement them by providing a
solution for personalized mentorship and practical, hands-on skill
acquisition in a convenient, community-driven, and trustworthy
environment.

## Gantt Chart of the Project

<span id="_Toc212095364" class="anchor"></span>Figure ‎1.1: Gantt Chart
for the Khubrah-Link Project

The chart illustrates the methodical progression from Phase 1: Analysis
through to Phase 4: Testing. Each task bar represents the allocated
timeframe, ensuring that critical path activities are completed in a
logical sequence to facilitate a coherent and efficient development
process.

***Chapter 2***

# BACKGROUND OF THE OLD SYSTEM

## Background

The exchange of knowledge and skills is a fundamental aspect of human
societal development. Historically, this transfer occurred through
highly localized and personal interactions, such as apprenticeships,
mentorships within guilds, and informal community-based learning
(Putnam, 2000). These traditional methods relied heavily on dense social
networks and high levels of community trust, where reputation was
established through direct, repeated interactions and word-of-mouth
within a close-knit environment.

In the modern era, factors such as urbanization, increased mobility, and
the shift towards digital communication have fundamentally altered the
structure of our communities. While these changes have brought numerous
benefits, they have also led to a gradual erosion of the traditional
social fabric that once facilitated informal skill sharing. The channels
for discovering a local mentor or a skilled neighbor have become less
apparent, even as the desire for practical, personalized learning
remains strong.

In response, individuals have adapted by co-opting modern technologies
that were not purpose-built for skill exchange. This has resulted in a
fragmented, makeshift ecosystem for peer-to-peer learning. The "old
system," therefore, is not a single piece of legacy software but rather
the amalgamation of these disparate, inefficient, and often unreliable
methods currently in use. This chapter provides an overview of this
existing process and highlights the profound limitations that
necessitate the development of the proposed Khubrah-link platform.

## Old System Overview

The "old system" for local skill sharing can be characterized as a
decentralized and ad-hoc process that relies on a combination of analog
social networking and general-purpose digital communication tools. There
is no central platform, standardized procedure, or dedicated
infrastructure. An overview of the typical workflow and its inherent
components is detailed below.

**Process Flow of the Old System:**

1.  **Discovery/Search:** When an individual needs to learn a skill,
    their search process is typically initiated through one of the
    following channels:

    - **Word-of-Mouth:** The primary method involves querying their
      immediate social circle (friends, family, colleagues) for
      recommendations.

    - **Physical Community Hubs:** In some cases, individuals may resort
      to posting or looking at flyers on notice boards in local
      community centers, libraries, or universities.

    - **General-Purpose Digital Platforms:** The most common digital
      approach involves posting an inquiry in a generic, location-based
      Facebook group, a local online forum, or browsing a classifieds
      website (e.g., Dubizzle, OLX).

2.  **Vetting and Trust Establishment:** There is no formal mechanism
    for vetting a skill provider. A learner must rely entirely on the
    personal endorsement of a trusted acquaintance or take a significant
    risk based on a provider's self-proclaimed expertise in an online
    post.

3.  **Communication and Scheduling:** All coordination is handled
    externally through disparate channels such as phone calls, SMS,
    WhatsApp, or Facebook Messenger. This often leads to inefficient,
    difficult-to-track conversations.

4.  **Transaction and Feedback:** Any financial arrangements are managed
    directly between the two parties (e.g., cash, direct bank transfer),
    with no intermediary to ensure fairness or security. Feedback is
    non-existent in a public sense; a positive or negative experience is
    only shared privately within the learner's social circle, failing to
    benefit the wider community.

**Limitations of the Old System:**

- **High Search Costs and Inefficiency:** The process of finding a
  suitable and trustworthy skill provider is time-consuming, unreliable,
  and heavily dependent on chance.

- **Severe Lack of Trust and Transparency:** Without a centralized
  reputation or review system, it is nearly impossible for a learner to
  accurately assess the quality, reliability, or safety of a provider
  before committing time and potentially money.

- **Limited Reach and Visibility:** The visibility of both skill
  providers and seekers is severely restricted to their immediate social
  networks or the specific online groups they are part of, preventing
  countless potential connections.

- **Absence of Dedicated Tools:** The process lacks purpose-built tools
  for managing inquiries, scheduling sessions, or building a credible
  public profile, creating a frustrating and unprofessional experience
  for all participants.

## Previous Studies

The literature on peer-to-peer skill exchange and sharing-economy
platforms spans several domains, including platform design, educational
applications, trust mechanisms, and community learning. Several recent
papers describe prototype skill-sharing platforms and their
architectures. For example, Balotra et al. (2025) outline a web-based
skill-sharing marketplace that emphasizes security and scalability,
integrating user authentication, secure payments, and AI-driven
recommendations to boost credibility. Similarly, Bhagya et al. (2025)
present a peer-to-peer skill exchange system where users register,
create profiles, and undergo skill‐level assessments so that learners
and mentors with complementary skills can connect. These designs
typically include features like booking systems, real-time collaboration
(e.g., video calls) and discussion forums to facilitate live mentorship
and interaction. In one academic case, Obionwu et al. (2022) integrated
a blog-like forum into an educational platform to enable students to
post doubts and share experiences. Their evaluation showed strong user
approval: over 75% of participants agreed that the blogs “had the
potential to facilitate the expression of ideas,” and 66% agreed they
“enhance teamwork” (scitepress.org). Together, these works demonstrate
key design elements (matching algorithms, user profiles, content-sharing
tools) that can inform *Khubrah-link*. However, most studies focus on
campus or global online contexts, not tightly-knit local communities.
Khubrah-link extends prior designs by targeting community-based skill
exchange, where users often know each other or share local context; it
can therefore leverage additional trust signals and offline meetups. In
summary, prior platform implementations show the feasibility of P2P
skill networks, but highlight gaps in addressing purely local,
non-commercial scenarios and in verifying intangible skills in situ.

**Sharing Economy in Education and Personal Services**

The broader “sharing economy” literature provides context on
peer-to-peer learning and service platforms. For instance,
Cornejo‐Velázquez et al. (2020) review major online education services
(Coursera, Udemy, etc.) and distill their business models: they
emphasize collaborative consumption with shared resources, big-data
analytics, and an “online cash” microtransaction model (eric.ed.gov).
This shows how large-scale e-learning already embodies sharing-economy
principles (networked, trust-based access to courses rather than
ownership). Other analyses of the sharing economy (Rathnayake et al.
2023) identify diverse shareable resources (including “people” and
skills) and an online process (listing, negotiation, transaction,
feedback). These frameworks underscore that *Khubrah-link* fits into a
general movement of digital sharing: users list and exchange time/skills
without transferring ownership, guided by platform mediation. In
educational settings, sharing economy ideas have been applied to
knowledge platforms: for example, studies of MOOCs and professional
networks note that reputation incentives can have real-world impact –
high StackOverflow reputation, for example, correlates with better job
prospects for programmers. Similarly, Livan et al. (2022) show that
online communities (like StackOverflow) self-organize into specialists
and generalists according to reputation systems. These findings suggest
that digital platforms can successfully mobilize peer tutoring and skill
exchange at scale. Yet most existing education-sharing studies still
target broad, often commercialized contexts. *Khubrah-link*, by
contrast, would concentrate on local personal services and skills
(tutoring, crafts, neighbor-to-neighbor help, etc.), a niche
underexplored by current literature. In other words, while prior work
confirms that networked learning and peer services can thrive under a
sharing economy model, it has not deeply studied micro-community
platforms. *Khubrah-link* aims to fill this gap by applying
sharing-economy principles (mutual help, collaborative learning)
specifically within neighborhoods or community groups, including
possibly non-monetary exchanges or local credit systems.

**Trust, Reputation, and User Verification**

Trust is a critical enabler in P2P skill platforms because users often
transact with strangers. Recent studies emphasize different trust
models. In broad terms, Gruber (2020) contrasts personal trust
(face-to-face, community-based) with system trust (platform-mediated,
technology-driven) in sharing economy contexts (frontiersin.org).
Community-based models (like a local co-op) rely on personal
relationships, whereas platforms like Airbnb build system trust through
digital tools. On digital platforms, reputation and identity cues are
key. Zloteanu et al. (2018) experimentally demonstrate that users’ trust
and reputation information (profile completeness, ratings, reviews)
substantially increase perceived trustworthiness and willingness to
engage (journals.plos.org). In practice, platforms typically adopt
mechanisms like star ratings, verified IDs, and feedback systems. For
example, Livan et al. (2022) note that many platforms use identity
verification or reputation scores (e.g., star reviews on Uber/Airbnb) to
foster trust in decentralized environments. They also show that such
reputation systems steer user behavior: “digital reputation systems
\[…\] reward/punish specific actions” so that only certain behaviors
(and users) sustain success. In community knowledge platforms, these
systems have measurable effects: high reputation on StackOverflow
correlates with real-world rewards (e.g., job prospects).

Nonetheless, trust remains the single biggest barrier in sharing
services. Nishimura et al. (2022) find that uncertainty about unknown
peers dramatically reduces platform use. Their Tokyo study reports that
users cite “low trustworthiness” and anxiety about dealing with
strangers as obstacles to skill-sharing (mdpi.com). They emphasize that
“trust is considered the most important issue” in such services, noting
that many platforms mitigate this by offering review and rating systems
to ensure reliability (mdpi.com). Zamiri et al. (2024) similarly
highlight trust as the “bedrock of effective knowledge sharing,” arguing
that learners only share openly in high-trust communities (mdpi.com). In
sum, the literature shows that robust identity verification (OAuth, KYC,
blockchain certificates, etc.) and transparent reputation features
(ratings, reviews, badges) are essential design elements. For
*Khubrah-link*, these insights imply combining online trust mechanisms
with the advantages of a local setting: for example, users might
cross-verify identity via community endorsements or local events,
augmenting pure digital signals. By explicitly addressing verification
(through documented skills, references, or partnerships with community
organizations) *Khubrah-link* can tackle the gaps noted by past studies,
where generic platforms left trust solely to ratings and digital
identity (mdpi.com).

**Community Knowledge-Sharing and Social Learning**

Several works examine how peer learning and social interactions drive
knowledge exchange in online communities. Obionwu et al. (2022)
demonstrated that embedding discussion blogs within an academic platform
fostered reflection and peer interaction. Their users largely reported
that the blog helped them express ideas and collaborate more effectively
(scitepress.org). More broadly, studies of knowledge forums (like
StackOverflow) reveal that community-driven platforms encourage users to
specialize and help each other. In StackOverflow, for instance, users
naturally diverge into specialists and generalists, and high-reputation
specialists tend to post the accepted answers. These platforms also
reinforce participation: Livan et al. observe that reputation points and
badges on StackOverflow reward valuable contributions, “ultimately
selecting which kinds of user behaviours \[…\] may get to experience
sustained success”. In educational and workplace learning networks,
social features (peer support, forums, co-authoring) are likewise shown
to increase engagement and learning outcomes.

A systematic review by Zamiri et al. (2024) notes that modern learning
communities rely heavily on collaborative digital tools: online forums
and social platforms enable learners to exchange knowledge globally
(mdpi.com). They also stress that these learning communities require
trust and psychological safety: only in high-trust groups will
participants share knowledge and even their uncertainties (mdpi.com).
Similarly, Nishimura et al. (2022) identify sociality and spontaneity as
unique aspects of skill-sharing services: many platforms include
features (like bonus “gratuities” or shared local content) explicitly
intended to build social connections (mdpi.com). They observe that
providers can achieve self-actualization and altruistic satisfaction by
teaching others, while learners enjoy the experience and sense of
novelty (mdpi.com). These findings imply that *Khubrah-link* should not
only match skills but also cultivate community bonds (e.g., event
meet-ups, peer recognition) to tap intrinsic motivations.

**Research Gaps**

In summary, prior studies cover many relevant aspects, but also reveal
gaps that *Khubrah-link* can fill. Most existing platform designs and
studies assume broad or online-centric communities, whereas
*Khubrah-link* focuses on local neighborhood networks, where users may
share cultural context. This opens opportunities (e.g., leveraging local
trust, bilingual support, coordinated meetups) not examined in the
literature. Likewise, studies on the sharing economy often emphasize
commercial or global services; few investigate small-scale community
learning for personal skills. In trust research, generic rating systems
prevail, but *Khubrah-link* can integrate community-based verification
to strengthen reliability. Finally, while social learning studies
highlight community and intrinsic motivations (mdpi.com, mdpi.com), they
rarely address how a dedicated local platform could unite these factors.
*Khubrah-link* aims to address these gaps by tailoring platform design
to community needs: combining proven digital trust mechanisms with local
engagement strategies and support for peer mentoring in real-world
settings.

## Chapter Conclusion

This chapter has provided a comprehensive examination of the background
and the state of existing systems for local skill sharing, along with an
in-depth review of previous studies. First, the analysis of the “old
system” revealed that current practices are not formalized but instead
fragmented, relying on word-of-mouth, generic digital platforms, and
ad-hoc arrangements. These methods were shown to suffer from critical
inefficiencies, high search costs, limited visibility, and a fundamental
lack of trust and transparency.

Second, the literature review highlighted a range of academic and
technical contributions in the areas of peer-to-peer skill-sharing
platforms, the sharing economy, digital trust mechanisms, and
community-driven learning environments. While these studies demonstrate
the feasibility of digital peer learning and provide valuable insights
into design elements such as reputation systems, matching algorithms,
and collaborative tools, they also reveal significant gaps. In
particular, most existing platforms focus on global or commercial
contexts, with limited attention to hyperlocal, community-centered
solutions. Moreover, the studies emphasize the importance of trust and
identity verification, yet few offer frameworks tailored to
neighborhood-level interactions or cultural contexts relevant to local
communities.

The key conclusion from this chapter is twofold: (1) the inadequacy of
existing informal systems necessitates a structured, reliable, and
community-focused platform; and (2) the gaps identified in prior
research and implementations create a clear opportunity for innovation.
Together, these findings provide a compelling justification for the
proposed *Khubrah-link* platform. By directly addressing the
inefficiencies of the current methods and integrating insights from
prior studies—particularly in trust-building, local engagement, and
peer-to-peer collaboration— *Khubrah-link* aims to deliver a unique and
impactful solution.

Having established both the problem context and the academic foundation,
the next chapter will present the systematic methodology adopted to
analyze requirements and guide the design and development of the
proposed platform.

***Chapter 3***

# ANALYSIS AND METHODOLOGY

## Overview

This chapter presents the comprehensive analysis and methodology
employed in the development of the Khubrah-Link platform. The systematic
approach adopted for this project encompasses the selection of an
appropriate development methodology, detailed requirements gathering and
analysis techniques, system modeling, and the specification of
functional and non-functional requirements. The methodology serves as
the bridge between the identified problems and objectives outlined in
previous chapters and the concrete design and implementation phases that
follow.

The analysis phase is critical in transforming the conceptual
understanding of the skill-sharing platform into tangible, actionable
specifications. This chapter documents the methodical processes used to
elicit, analyze, and specify system requirements, ensuring alignment
with stakeholder needs and project objectives. Additionally, it presents
the modeling techniques employed to visualize system behavior and data
relationships, providing a solid foundation for subsequent design and
implementation phases.

The selection of appropriate methodologies and analytical tools was
guided by the project's academic context, the 10-week time constraint,
and the need to deliver a functional prototype that demonstrates the
core value proposition of connecting local skill providers with learners
in a trusted, structured environment. The approaches described herein
reflect software engineering best practices adapted to the specific
requirements and constraints of this final year project, ensuring that
the development process remains organized, efficient, and focused on
delivering essential functionalities within the available timeframe.

## Development Methodology

The selection and implementation of an appropriate development
methodology is crucial for the successful delivery of any software
project. For the Khubrah-Link platform, the methodology must accommodate
the project's academic timeline, the collaborative nature of team
development, and the need for iterative refinement based on continuous
feedback and testing.

- **Agile Methodology Selection**

After careful evaluation of various software development methodologies,
including Waterfall, Spiral, and Agile approaches, the team selected an
adapted Agile methodology, specifically incorporating elements of Scrum
framework, for the development of Khubrah-Link. This decision was based
on several key factors that align with the project's requirements and
constraints.

The Agile methodology was chosen for its inherent flexibility and
adaptability, which are essential given the exploratory nature of
developing a novel community-based platform. Unlike the rigid,
sequential phases of the Waterfall model, Agile allows for iterative
development where requirements can evolve based on ongoing discoveries
and feedback. The emphasis on working software over comprehensive
documentation in Agile aligns well with the project's goal of delivering
a functional prototype within the academic timeframe.

Furthermore, the collaborative nature of Agile methodology supports the
five-member team structure effectively. The customer collaboration
principle of Agile is adapted in this academic context through regular
consultations with the project supervisor, who serves as a proxy for
end-users and provides domain expertise. Risk mitigation is another
significant advantage of the Agile approach. By delivering functional
increments every two weeks, the team can identify and address technical
challenges, integration issues, or requirement misunderstandings early
in the development process.

- **Development Iterations and Sprints**

The implementation of Agile methodology for Khubrah-Link is structured
around two-week sprints, aligned with the 10-week project timeline to
accommodate five complete development iterations. Each sprint follows a
consistent pattern of planning, development, review, and retrospective
activities.

- **Sprint Structure:** Each two-week sprint begins with a planning
  session to select user stories from the product backlog. During the
  sprint, the team conducts brief stand-up meetings twice weekly to
  synchronize activities. Sprint reviews are conducted on the final
  Friday of each iteration to demonstrate completed functionalities to
  the project supervisor.

- **Sprint Allocation and Major Deliverables:**

  - **Sprint 1 (Weeks 1-2): Foundation and Infrastructure.** Focuses on
    establishing the development environment, version control, and basic
    project architecture.

  - **Sprint 2 (Weeks 3-4): Core User Management.** Delivers fundamental
    user capabilities, including registration, authentication, and
    profile creation.

  - **Sprint 3 (Weeks 5-6): Search and Discovery Features.** Implements
    the platform's core search and filtering functionality.

  - **Sprint 4 (Weeks 7-8): Communication and Scheduling.** Delivers the
    real-time messaging system and session scheduling capabilities.

  - **Sprint 5 (Weeks 9-10): Reviews, Testing, and Deployment.** Focuses
    on implementing the review system, comprehensive testing, and
    preparing for deployment.

<!-- -->

- **Backlog Management and Prioritization**

The product backlog is maintained as a living document, with user
stories prioritized using the MoSCoW method (Must have, Should have,
Could have, Won't have). Critical features identified as "Must have"
include user registration, profile management, skill search, messaging,
scheduling, and the review system. This ensures that essential
functionalities are developed and delivered with the highest priority.

## Requirements Gathering Techniques

The systematic gathering and analysis of requirements is fundamental to
the success of any software development project. For the Khubrah-Link
platform, a practical approach to requirements elicitation was employed
to ensure comprehensive understanding of user needs, system
capabilities, and technical constraints. This section details the
primary techniques utilized to collect and analyze requirements that
informed the system specification.

- **Literature Review and Background Research**

The literature review conducted in Chapter 2 served as a foundational
requirements gathering technique. By analyzing academic papers and case
studies on peer-to-peer platforms, sharing economy models, and trust
mechanisms in digital marketplaces, the team extracted valuable insights
that directly informed system requirements.

The analysis of platform design studies revealed essential requirements
including the necessity for user authentication systems, real-time
communication capabilities, and comprehensive profile management.
Research on trust and reputation systems, particularly studies on
digital trust signals and user feedback mechanisms, established critical
requirements for the review and rating system. The findings indicated
that transparency in user feedback and two-way evaluation mechanisms are
essential for building platform credibility, which directly influenced
the decision to make the two-way review system a mandatory feature.

Literature on community knowledge-sharing platforms emphasized the role
of social features in sustaining engagement. This analysis resulted in
requirements for messaging capabilities, the ability to view provider
activity history, and the incorporation of social proof elements such as
total sessions completed and average ratings. Furthermore, the
identified research gaps—particularly the lack of platforms addressing
hyperlocal, community-based skill exchange—validated several unique
requirements for Khubrah-Link, including location-based filtering and
support for both in-person and online session types.

- **Competitive Analysis**

A systematic competitive analysis was conducted to examine existing
platforms operating in adjacent market spaces. While no direct
competitor targeting community-based, peer-to-peer skill sharing at the
local level was identified, several platforms provided valuable insights
through their strengths and limitations.

- **Global E-Learning Platforms (Coursera, Udemy):** The analysis
  revealed sophisticated search and filtering patterns, user-friendly
  interfaces, and comprehensive review systems. However, their
  one-to-many model and lack of personalization highlighted the need for
  Khubrah-Link to emphasize one-on-one connections and flexible
  scheduling. Key requirements derived include advanced search
  functionality, skill categorization systems, and intuitive user
  interfaces.

- **Freelance Marketplaces (Upwork, Fiverr):** These platforms provided
  insights into profile construction and service listing formats. The
  detailed portfolio sections and skill tagging systems informed
  requirements for comprehensive user profiles. However, their complex
  pricing structures reinforced the decision to keep Khubrah-Link's
  model simpler by excluding integrated payment processing.

- **Local Service Platforms (TaskRabbit):** These platforms demonstrated
  effective location-based service discovery and availability
  management. Requirements derived include location-based filtering with
  radius search and session scheduling with confirmation workflows.

The competitive analysis demonstrated that no existing platform
adequately serves the identified market need for hyperlocal, trusted,
peer-to-peer skill exchange. This gap analysis validated several unique
requirements including mandatory location-based filtering, equal
treatment of providers and learners, and support for both monetary and
non-monetary exchange arrangements.

- **Stakeholder Consultation**

Regular consultations with the project supervisor, Dr. Mufrah Waqddani,
provided valuable input throughout the requirements gathering process.
These consultations helped validate initial requirements, identify
missing functionalities, and ensure that the system design remained
aligned with project objectives and academic standards.

The supervisor's experience and domain knowledge guided the team in
prioritizing features appropriately for the 10-week timeframe. Feedback
during early discussions helped refine the scope, ensuring that the team
focused on core functionalities rather than attempting to implement
every possible feature. This guidance was particularly valuable in
distinguishing between "must-have" features essential for a minimum
viable product and "nice-to-have" features that could be deferred to
future development phases.

- **Team Brainstorming and Analysis**

The development team conducted structured brainstorming sessions to
identify system requirements based on the problem statement and project
objectives outlined in Chapter 1. These sessions involved discussing
potential user scenarios, identifying necessary system features, and
analyzing technical constraints.

Team members contributed diverse perspectives based on their individual
experiences with similar platforms and their understanding of the target
user base. These discussions helped identify practical requirements that
might not be immediately apparent from literature or competitive
analysis alone, such as the need for mobile responsiveness given the
prevalence of smartphone usage, and the importance of simple,
straightforward workflows to accommodate users with varying levels of
technical literacy.

- **Requirements Documentation and Validation**

All requirements gathered through the various techniques were
systematically documented and organized. The team reviewed the compiled
requirements collectively to ensure completeness, clarity, and
consistency. Requirements were validated against the project objectives
defined in Chapter 1 to ensure alignment with the overall project goals.

Ambiguous or conflicting requirements were discussed and resolved
through team consensus and supervisor guidance. This validation process
ensured that the final requirements specification, presented in Section
3.4, accurately reflects the system that needs to be built while
remaining achievable within the project constraints.

## System Requirements Specification

The requirements specification process transforms insights from the
requirements gathering phase into precise, testable, and implementable
system requirements. This section presents a comprehensive specification
of both functional and non-functional requirements for the Khubrah-Link
platform. Each requirement is categorized using the MoSCoW
prioritization method (Must have, Should have, Could have, Won't have)
to guide implementation sequencing and ensure that critical features are
delivered within the project timeline.

### Functional Requirements

Functional requirements define specific behaviors, functions, and
capabilities that the system must provide. They describe what the system
should do in response to particular inputs or under specific conditions.
The functional requirements for Khubrah-Link are organized by major
system modules.

- **User Account Management**

<!-- -->

- **FR-1.1 \[MUST\]** The system shall provide a user registration
  interface requiring email address, full name, password, phone number,
  and location (city/neighborhood).

- **FR-1.2 \[MUST\]** The system shall enforce password strength
  requirements: minimum 8 characters including at least one uppercase
  letter, one lowercase letter, one number, and one special character.

- **FR-1.3 \[MUST\]** The system shall send an email verification link
  upon registration and restrict account access until email is verified.

- **FR-1.4 \[MUST\]** The system shall provide secure login
  functionality using email and password with session management.

- **FR-1.5 \[MUST\]** The system shall implement logout functionality
  that terminates the user session.

- **FR-1.6 \[MUST\]** The system shall provide password reset
  functionality via email with time-limited reset tokens.

- **FR-1.7 \[SHOULD\]** The system shall allow users to update their
  profile information including name, phone number, location, and
  profile picture.

<!-- -->

- **Profile Management**

<!-- -->

- **FR-2.1 \[MUST\]** The system shall allow users to create and manage
  multiple skill listings under "Skills I Can Teach," each including
  skill name, category, description, and experience level.

- **FR-2.2 \[MUST\]** The system shall allow users to create skill
  interests under "Skills I Want to Learn," including skill name and
  category.

- **FR-2.3 \[MUST\]** The system shall provide a skill categorization
  system with predefined categories (e.g., Technology, Arts & Crafts,
  Languages, Music, Sports, Cooking).

- **FR-2.4 \[SHOULD\]** The system shall allow users to set availability
  preferences (days of the week and time preferences).

- **FR-2.5 \[SHOULD\]** The system shall display user statistics on
  profiles including total sessions completed, average rating, and
  member since date.

- **FR-2.6 \[SHOULD\]** The system shall allow users to write a
  biography section describing their background.

<!-- -->

- **Search and Discovery**

<!-- -->

- **FR-3.1 \[MUST\]** The system shall provide a search interface
  allowing users to search for skill providers by skill name or keyword.

- **FR-3.2 \[MUST\]** The system shall implement filtering capabilities
  by skill category, location, and session type (in-person or online).

- **FR-3.3 \[MUST\]** The system shall display search results showing
  provider name, profile picture, primary skills, average rating, and
  location.

- **FR-3.4 \[SHOULD\]** The system shall implement location-based
  sorting, displaying providers nearest to the searcher first.

- **FR-3.5 \[SHOULD\]** The system shall provide sorting options for
  search results including highest rated and most sessions completed.

- **FR-3.6 \[SHOULD\]** The system shall implement pagination for search
  results, displaying 12 results per page.

<!-- -->

- **Messaging System**

<!-- -->

- **FR-4.1 \[MUST\]** The system shall provide a messaging interface
  allowing registered users to communicate with skill providers.

- **FR-4.2 \[MUST\]** The system shall display all conversations in an
  inbox view showing the other party's name, last message preview, and
  timestamp.

- **FR-4.3 \[MUST\]** The system shall support text messages with a
  maximum length of 1000 characters per message.

- **FR-4.4 \[MUST\]** The system shall timestamp all messages and
  display them in chronological order.

- **FR-4.5 \[SHOULD\]** The system shall provide notification indicators
  for unread messages.

- **FR-4.6 \[SHOULD\]** The system shall allow users to search their
  message history by contact name.

<!-- -->

- **Scheduling and Booking**

<!-- -->

- **FR-5.1 \[MUST\]** The system shall allow learners to request a
  session with a provider by selecting a proposed date, time, and
  session type.

- **FR-5.2 \[MUST\]** The system shall notify providers of new session
  requests.

- **FR-5.3 \[MUST\]** The system shall allow providers to accept or
  decline session requests.

- **FR-5.4 \[MUST\]** The system shall display all scheduled sessions
  showing date, time, other party's name, skill topic, and session
  status.

- **FR-5.5 \[SHOULD\]** The system shall send reminder notifications
  before scheduled sessions to both parties.

- **FR-5.6 \[SHOULD\]** The system shall allow either party to request
  cancellation or rescheduling of confirmed sessions.

- **FR-5.7 \[SHOULD\]** The system shall allow providers to mark
  sessions as completed.

<!-- -->

- **Review and Rating**

<!-- -->

- **FR-6.1 \[MUST\]** The system shall prompt both the provider and
  learner to submit a review after a session is marked as completed.

- **FR-6.2 \[MUST\]** The system shall require users to provide a star
  rating (1-5 stars) and written feedback for each review.

- **FR-6.3 \[MUST\]** The system shall display reviews on user profiles
  showing reviewer name, rating, written feedback, and date.

- **FR-6.4 \[MUST\]** The system shall calculate and display average
  ratings on user profiles.

- **FR-6.5 \[SHOULD\]** The system shall display rating distribution
  (number of 5-star, 4-star, 3-star, 2-star, and 1-star reviews) on
  profiles.

<!-- -->

- **Administrative Functions**

<!-- -->

- **FR-7.1 \[MUST\]** The system shall provide an administrative
  dashboard accessible only to users with administrator privileges.

- **FR-7.2 \[MUST\]** The system shall allow administrators to view and
  search all user accounts.

- **FR-7.3 \[MUST\]** The system shall allow administrators to suspend
  or delete user accounts.

- **FR-7.4 \[SHOULD\]** The system shall allow administrators to view
  and moderate reported content.

- **FR-7.5 \[SHOULD\]** The system shall provide basic analytics
  displaying total registered users, total skills listed, and total
  sessions booked.

### Non-Functional Requirements

Non-functional requirements specify quality attributes, constraints, and
standards that the system must meet. These requirements define how the
system should perform its functions rather than what functions it should
provide.

- **Performance Requirements**

<!-- -->

- **NFR-1.1 \[MUST\]** The system shall load the home page within 3
  seconds under normal network conditions.

- **NFR-1.2 \[MUST\]** The system shall deliver search results within 2
  seconds for standard queries.

- **NFR-1.3 \[SHOULD\]** The system shall support at least 50 concurrent
  users without performance degradation.

- **NFR-1.4 \[SHOULD\]** The system shall deliver messages with minimal
  latency under normal conditions.

<!-- -->

- **Security Requirements**

<!-- -->

- **NFR-2.1 \[MUST\]** The system shall encrypt all user passwords using
  bcrypt hashing algorithm.

- **NFR-2.2 \[MUST\]** The system shall use HTTPS for all data
  transmission.

- **NFR-2.3 \[MUST\]** The system shall implement session management
  with secure cookies and automatic session timeout after 24 hours of
  inactivity.

- **NFR-2.4 \[MUST\]** The system shall protect against common web
  vulnerabilities including SQL injection and Cross-Site Scripting
  (XSS).

- **NFR-2.5 \[SHOULD\]** The system shall implement rate limiting on
  authentication endpoints to prevent brute-force attacks.

- **NFR-2.6 \[SHOULD\]** The system shall sanitize all user inputs to
  prevent malicious code injection.

<!-- -->

- **Usability Requirements**

<!-- -->

- **NFR-3.1 \[MUST\]** The system shall provide a responsive design that
  adapts to screen sizes from mobile devices (320px width) to desktop
  displays (1920px width).

- **NFR-3.2 \[MUST\]** The system shall ensure all interactive elements
  are easily accessible on touch devices.

- **NFR-3.3 \[MUST\]** The system shall provide clear error messages
  guiding users on how to correct input errors.

- **NFR-3.4 \[SHOULD\]** The system shall maintain consistent navigation
  structure across all pages.

- **NFR-3.5 \[SHOULD\]** The system shall follow basic accessibility
  guidelines including proper heading hierarchy and keyboard navigation
  support.

- **NFR-3.6 \[SHOULD\]** New users shall be able to complete
  registration and create a basic profile within 5 minutes.

<!-- -->

- **Reliability Requirements**

<!-- -->

- **NFR-4.1 \[SHOULD\]** The system shall maintain stable operation
  during normal usage periods.

- **NFR-4.2 \[SHOULD\]** The system shall implement database backup
  procedures.

- **NFR-4.3 \[SHOULD\]** The system shall handle errors gracefully,
  displaying user-friendly messages rather than technical error details.

- **NFR-4.4 \[SHOULD\]** The system shall implement logging mechanisms
  for debugging and monitoring purposes.

<!-- -->

- **Maintainability Requirements**

<!-- -->

- **NFR-5.1 \[MUST\]** The system shall be developed using modular
  architecture with clear separation of concerns.

- **NFR-5.2 \[MUST\]** The source code shall include comments for
  complex logic and documentation for major functions.

- **NFR-5.3 \[SHOULD\]** The system shall follow consistent coding
  standards and naming conventions throughout the codebase.

- **NFR-5.4 \[SHOULD\]** The system shall include documentation with
  setup instructions and architecture overview.

<!-- -->

- **Compatibility Requirements**

<!-- -->

- **NFR-6.1 \[MUST\]** The system shall be compatible with major web
  browsers including Chrome, Firefox, Safari, and Edge.

- **NFR-6.2 \[SHOULD\]** The system shall function properly on mobile
  browsers including iOS Safari and Android Chrome.

- **NFR-6.3 \[SHOULD\]** The system shall provide core functionality
  even on older browser versions with graceful degradation.

<!-- -->

- **Legal and Compliance Requirements**

<!-- -->

- **NFR-7.1 \[MUST\]** The system shall comply with basic data
  protection principles, collecting only necessary user information.

- **NFR-7.2 \[MUST\]** The system shall provide Terms of Service and
  Privacy Policy accessible from all pages.

- **NFR-7.3 \[SHOULD\]** The system shall obtain user consent before
  sending non-essential communications.

- **NFR-7.4 \[SHOULD\]** The system shall allow users to request
  deletion of their personal data where applicable.

**Requirements Summary**

The requirements specified above provide a comprehensive foundation for
the design and implementation of the Khubrah-Link platform. The
prioritization using the MoSCoW method ensures that the development team
focuses on essential "Must have" requirements first, followed by "Should
have" features that enhance the system, while acknowledging "Could have"
features as potential future enhancements. This structured approach to
requirements specification ensures that the project delivers core
functionalities <span dir="rtl"></span>while maintaining quality and
meeting stakeholder expectations.

## System Modeling

System modeling is an essential activity in software engineering that
provides visual representations of system functionality, structure, and
behavior. Models serve as communication tools among team members and
stakeholders, helping to ensure a shared understanding of the system
being developed. For the Khubrah-Link platform, system modeling
techniques were employed to capture user interactions, system processes,
and data relationships. This section presents the key models developed
during the analysis phase, including use case diagrams and
entity-relationship diagrams, which form the foundation for subsequent
design and implementation activities.

### Use Case Diagram

A use case diagram is a behavioral model that represents the functional
requirements of a system from the user's perspective. It identifies the
actors (users or external systems) that interact with the system and the
use cases (system functionalities) they can perform. The use case
diagram provides a high-level view of system functionality and helps
ensure that all user requirements are captured and understood.

<span id="_Toc212095365" class="anchor"></span>Figure ‎3.1: Use Case
Diagram for Khubrah-Link

- **Actors**

The Khubrah-Link platform has three primary actors:

1.  **Guest User (Unregistered Visitor):** Individuals who access the
    platform without creating an account. They have limited access to
    explore the platform and view public information.

2.  **Registered User:** Individuals who have created accounts on the
    platform. A registered user can act in dual capacities: as a Skill
    Provider (offering skills to teach) and as a Skill Seeker (looking
    to learn skills). The system treats these as roles within the same
    user account rather than separate actor types.

3.  **Administrator:** System administrators responsible for platform
    management, user moderation, and system oversight.

- **Use Cases**

The use cases are organized by actor and represent the main
functionalities accessible to each:

- **Guest User Use Cases**

  - **Browse Skills:** View the list of available skills and skill
    providers without logging in.

  - **Search Providers:** Use the search functionality to find skill
    providers by skill name, category, or location.

  - **View Provider Profile:** Access public profile information of
    skill providers including their skills, ratings, and reviews.

  - **View Platform Information:** Access static pages such as About Us,
    How It Works, and FAQ.

  - **Register Account:** Create a new user account to access full
    platform features.

- **Registered User Use Cases**

*Account Management*

- **Login:** Authenticate to access the platform using email and
  password.

- **Logout:** End the current session and exit the platform.

- **Manage Profile:** Edit personal information, update profile picture,
  and modify account settings.

- **Reset Password:** Request and complete password reset via email
  verification.

*Skill Management*

- **Add Skills to Teach:** Create listings for skills the user can
  teach, including descriptions and experience level.

- **Add Skills to Learn:** Specify skills the user wants to learn.

- **Edit Skill Listings:** Modify or remove existing skill offerings or
  learning interests.

- **Set Availability:** Define preferred days and times for teaching
  sessions.

*Search and Discovery*

- **Search for Providers:** Find skill providers using advanced search
  with filters.

- **View Search Results:** Browse through search results with provider
  information.

- **Filter by Location:** Narrow search results based on geographic
  proximity.

- **Filter by Category:** Refine search using skill categories.

*Communication*

- **Send Message:** Initiate or continue conversations with other users.

- **View Messages:** Access inbox and read messages from other users.

- **Reply to Messages:** Respond to received messages.

*Session Management*

- **Request Session:** Send a booking request to a skill provider with
  proposed date and time.

- **Accept/Decline Session:** (As Provider) Respond to session requests
  from learners.

- **View Scheduled Sessions:** Access calendar view of all upcoming and
  past sessions.

- **Cancel/Reschedule Session:** Request changes to confirmed sessions.

- **Mark Session Complete:** (As Provider) Indicate that a session has
  been completed.

*Review System*

- **Submit Review:** Provide rating and written feedback after
  completing a session.

- **View Received Reviews:** See reviews and ratings left by other
  users.

- **View Given Reviews:** Access reviews the user has submitted for
  others.

<!-- -->

- **Administrator Use Cases**

*User Management*

- **View All Users:** Access complete list of registered users with
  search capability.

- **Suspend User Account:** Temporarily disable a user account for
  policy violations.

- **Delete User Account:** Permanently remove a user account and
  associated data.

*Content Moderation*

- **Review Reported Content:** Examine user-flagged profiles, reviews,
  or messages.

- **Remove Inappropriate Content:** Delete content that violates
  platform policies.

- **Send Warning to User:** Notify users about policy violations.

*System Monitoring*

- **View Analytics:** Access dashboard showing platform statistics and
  metrics.

- **Monitor System Activity:** Track user registrations, sessions
  booked, and platform usage.

<!-- -->

- **Use Case Relationships**

The use case diagram includes several important relationships that
define how the use cases and actors interact:

- **Generalization:** The diagram utilizes a key Generalization
  relationship, where the Registered User inherits all capabilities of
  the Guest User. This is visually represented by the arrow pointing
  from Registered User to Guest User, signifying that a logged-in user
  can perform all guest actions (such as browsing and searching) in
  addition to their own specialized functions. Furthermore, the
  Registered User actor itself generalizes the roles of "Skill Provider"
  and "Skill Seeker," as a single account can perform the functions of
  both.

- **Extend Relationship:** Optional behaviors are modeled using an
  \<\<extend\>\> relationship. For example, the "Filter by Location" and
  "Filter by Category" use cases extend the "Search for Providers" use
  case. This correctly indicates that filtering is an optional
  functionality that a user can choose to apply when performing a
  search.

<!-- -->

- **System Boundary**

The system boundary in the use case diagram clearly delineates what is
inside the Khubrah-Link platform (all use cases) and what is outside
(the actors). External systems such as email services for verification
and notifications are shown as external entities that the system
interacts with but are not part of the core platform.

- **Use Case Diagram Benefits**

The development of the use case diagram provided several benefits to the
project:

1.  **Requirements Validation:** The diagram helped verify that all
    functional requirements identified in Section 3.4.1 are represented
    as use cases, ensuring comprehensive coverage.

2.  **Scope Clarification:** By visualizing all system functionalities,
    the team could clearly identify what is in scope and what is not,
    helping manage project boundaries.

3.  **Communication Tool:** The diagram served as an effective
    communication medium during discussions with the project supervisor
    and among team members, providing a shared visual reference.

4.  **Design Foundation:** The use cases directly inform the design of
    system components, user interfaces, and workflows in subsequent
    chapters.

5.  **Testing Basis:** Each use case represents testable functionality,
    providing a structured approach to test case development in Chapter
    7.

- **Use Case Descriptions**

While the diagram provides a visual overview, each critical use case was
also documented with detailed descriptions including preconditions, main
flow, alternative flows, and postconditions. These detailed descriptions
ensure that developers have sufficient information to implement each
functionality correctly and that testers understand the expected
behavior for validation purposes.

For example, the "Request Session" use case includes:

- **Precondition:** User must be logged in and viewing a provider's
  profile.

- **Main Flow:** User selects date/time, provides session details, sends
  request, system notifies provider.

- **Alternative Flow:** If provider is unavailable at selected time,
  system displays availability information.

- **Postcondition:** Session request is stored in database and provider
  receives notification.

The use case diagram, along with detailed use case descriptions, forms a
critical artifact that bridges requirements analysis and system design,
ensuring that the development team has a clear, shared understanding of
what needs to be built.

### Entity-Relationship (ER) Diagram

An Entity-Relationship (ER) diagram is a data modeling tool that
visually represents the structure of the database by showing entities,
their attributes, and the relationships between them. For the
Khubrah-Link platform, the ER diagram defines how users, skills,
sessions, and reviews are stored and connected in the database.

<span id="_Toc212095366" class="anchor"></span>Figure ‎3.2:
Entity-Relationship Diagram for Khubrah-Link Platform

- **Primary Entities**

The database consists of the following core entities:

- **User:** Stores information about all registered users. Key
  attributes include user_id (primary key), email, full_name, and
  location.

- **Skill:** Represents a distinct skill that can be taught or learned
  (e.g., "Python Programming," "Cooking"). Attributes include skill_id
  (primary key), skill_name, and category.

- **User_Skill (Junction Entity):** Links users to the skills they offer
  or seek, resolving the many-to-many relationship. Attributes include
  user_id (foreign key) and skill_id (foreign key).

- **Session:** Captures scheduled learning sessions. Key attributes
  include session_id (primary key), provider_id (foreign key),
  learner_id (foreign key), session_date, and status.

- **Review:** Stores ratings and feedback. Attributes include review_id
  (primary key), session_id (foreign key), reviewer_id (foreign key),
  rating, and review_text.

<!-- -->

- **Key Relationships**

<!-- -->

- **User ↔ Skill (Many-to-Many):** A user can have multiple skills, and
  a single skill can be offered by multiple users. This is handled by
  the User_Skill junction table.

- **User ↔ Session (Multiple Relationships):** Each session involves two
  users: one provider and one learner. A user can participate in many
  sessions in either role.

- **Session ↔ Review (One-to-Many):** A completed session can have two
  reviews associated with it (one from each participant).

The ER diagram provides a clear blueprint for implementing the database
in Chapter 4, ensuring that all functional requirements related to user
profiles, skill listings, session booking, and the review system are
properly supported by the data structure.

## Chapter Conclusion

This chapter has presented the analysis and methodology employed in
developing the Khubrah-Link platform. The Agile methodology with five
two-week sprints was selected to manage the 10-week timeline
effectively. Requirements were gathered through literature review,
competitive analysis, and supervisor consultation, then organized into
functional and non-functional requirements using MoSCoW prioritization.

The system modeling section provided two complementary views: the use
case diagram illustrated user interactions and system functionalities,
while the ER diagram defined the database structure and relationships.
These models serve as the foundation for the design phase in Chapter 4,
where the system architecture, detailed database schema, and user
interface designs will be developed.

***Chapter 4***

# SYSTEM DESIGN

## Overview 

System design is a critical phase in software development that
transforms the requirements and models established in the analysis phase
into detailed technical specifications. This chapter presents the
comprehensive design of the Khubrah-Link platform, translating the
functional and non-functional requirements identified in Chapter 3 into
concrete architectural decisions, database schemas, and interface
designs.

The design phase bridges the gap between what the system should do
(requirements) and how it will be built (implementation). A
well-structured design ensures that the system is scalable,
maintainable, secure, and capable of meeting user needs effectively. For
the Khubrah-Link platform, the design process focuses on creating a
robust architecture that supports peer-to-peer skill sharing while
maintaining simplicity appropriate for a 10-week development timeline.

This chapter is organized into several key sections. The system
architecture section describes the overall structural organization of
the platform, including the selection of architectural patterns and the
interaction between major system components. The database design section
provides detailed specifications for all database tables, their
attributes, data types, and relationships, building upon the
Entity-Relationship diagram presented in Chapter 3. The UML design
diagrams section presents sequence diagrams illustrating key system
processes and a class diagram showing the object-oriented structure of
the application. Finally, the user interface design section outlines the
principles and approaches guiding the development of intuitive,
user-friendly interfaces.

Throughout the design process, careful consideration was given to
balancing functional completeness with implementation feasibility.
Design decisions were made to ensure that the system could be fully
implemented within the project constraints while adhering to software
engineering best practices. The designs presented in this chapter serve
as blueprints for the implementation phase described in Chapter 5 and
provide the foundation for creating a cohesive, well-integrated
platform.

## System Architecture

The system architecture defines the high-level structure of the
Khubrah-Link platform, describing how different components are
organized, how they interact, and the technologies used to implement
them. A clear architectural design is essential for ensuring that the
system is modular, maintainable, and scalable.

- **Architectural Pattern**

The Khubrah-Link platform adopts a three-tier architecture, also known
as the Model-View-Controller (MVC) pattern, which separates the
application into three interconnected layers: the presentation layer
(View), the application logic layer (Controller), and the data layer
(Model). This architectural pattern was selected for several reasons:

- **Separation of Concerns:** Each layer has a distinct responsibility,
  making the codebase easier to understand, maintain, and modify.
  Changes to the user interface do not require modifications to business
  logic or database structure, and vice versa.

- **Modularity:** The three-tier structure allows different team members
  to work on different layers simultaneously without causing conflicts
  or dependencies, facilitating parallel development during the
  implementation phase.

- **Testability:** Each layer can be tested independently, improving the
  quality assurance process and making it easier to identify and fix
  bugs.

- **Scalability:** The separation of layers allows for future
  enhancements where individual layers can be optimized or scaled
  independently based on performance requirements.

<!-- -->

- **Architecture Layers**

<!-- -->

- **Presentation Layer (Frontend/View):** <span dir="rtl"></span>The
  presentation layer is responsible for all user interactions and the
  visual presentation of data. This layer consists of the web pages,
  forms, and interface elements that users interact with directly. For
  the Khubrah-Link platform, the presentation layer is implemented using
  standard web technologies:

  - **HTML5:** Provides the structural foundation for web pages,
    defining the content and layout elements.

  - **CSS3:** Handles the visual styling, including colors, fonts,
    spacing, and responsive design rules that adapt the interface to
    different screen sizes.

  - **JavaScript:** Adds interactivity and dynamic behavior to the user
    interface, enabling real-time updates, form validation, and
    asynchronous communication with the server.

The presentation layer includes all the user interfaces described in
Chapter 6, including registration forms, search interfaces, profile
pages, messaging systems, and the scheduling calendar. The design
emphasizes responsiveness, ensuring that the platform functions
effectively on both desktop and mobile devices.

- **Application Logic Layer (Backend/Controller):**
  <span dir="rtl"></span>The application logic layer contains the core
  business logic and processes that drive the platform's functionality.
  This layer receives requests from the presentation layer, processes
  them according to business rules, interacts with the data layer as
  needed, and returns appropriate responses. Key responsibilities
  include:

  - **Request Handling:** Processing HTTP requests from the frontend,
    including form submissions, search queries, and user actions.

  - **Business Logic Implementation:** Enforcing business rules such as
    password requirements, session validation, review submission rules,
    and access control.

  - **Data Processing:** Transforming data between the format required
    by the frontend and the format stored in the database.

  - **Authentication and Authorization:** Managing user sessions,
    verifying credentials, and ensuring users can only access functions
    and data appropriate to their role.

For the Khubrah-Link platform, the application logic layer is
implemented using a server-side programming language and framework.
Common choices for such projects include:

- **PHP with Laravel Framework:** Provides a robust MVC structure,
  built-in authentication, and database management tools.

- **Node.js with Express Framework:** Offers excellent performance for
  real-time features like messaging and uses JavaScript throughout the
  stack.

- **Python with Django or Flask:** Provides clean syntax, strong
  security features, and extensive libraries.

The specific technology selection is documented in Chapter 5 based on
team expertise and project requirements.

- **Data Layer (Model):** <span dir="rtl"></span>The data layer is
  responsible for data storage, retrieval, and persistence. This layer
  consists of the database management system and the data access logic
  that connects the application logic layer to the stored data. Key
  components include:

  - **Database Management System (DBMS):** A relational database system
    such as MySQL, PostgreSQL, or SQLite stores all persistent data in
    structured tables with defined relationships.

  - **Data Access Layer:** Provides an abstraction between the
    application code and the database, typically using an
    Object-Relational Mapping (ORM) system that allows developers to
    interact with database records as objects rather than writing raw
    SQL queries.

  - **Database Schema:** The structure of tables, columns, data types,
    constraints, and relationships as detailed in Section 4.3 of this
    chapter.

The data layer implements all the entities and relationships defined in
the Entity-Relationship diagram presented in Chapter 3, including users,
skills, sessions, reviews, and their interconnections.

- **Component Interaction Flow**

The three layers interact in a structured, unidirectional flow for
typical user operations:

1.  **User Action:** A user interacts with the presentation layer (e.g.,
    submits a search query, sends a message, books a session).

2.  **Request Processing:** The frontend sends an HTTP request to the
    application logic layer, typically as a POST or GET request
    containing necessary data.

3.  **Business Logic Execution:** The controller in the application
    logic layer receives the request, validates the data, applies
    business rules, and determines what data operations are needed.

4.  **Data Operation:** If data needs to be retrieved or modified, the
    application logic layer communicates with the data layer through the
    ORM or data access layer.

5.  **Database Interaction:** The data layer executes the appropriate
    database queries (SELECT, INSERT, UPDATE, DELETE) and returns the
    results.

6.  **Response Preparation:** The application logic layer processes the
    database results, formats them appropriately, and prepares a
    response.

7.  **Response Delivery:** The controller sends the response back to the
    presentation layer, typically as HTML, JSON, or XML data.

8.  **Display Update:** The frontend receives the response and updates
    the user interface to reflect the results of the action.

For example, when a user searches for skill providers:

- **Frontend:** User enters search term "photography" and clicks
  "Search"

- **Request:** AJAX call sends GET /search?query=photography to backend

- **Controller:** Search controller validates input, queries database
  for matching skills and users

- **Model:** Database returns relevant user and skill records

- **Controller:** Formats results into JSON response

- **Frontend:** Receives JSON, dynamically generates result cards and
  displays them

<!-- -->

- **Additional Architectural Components**

**Real-Time Messaging System**

The messaging feature requires real-time communication capabilities
beyond the traditional request-response cycle. This is implemented using
WebSocket technology, which maintains a persistent connection between
the client and server, allowing instant message delivery without
requiring page refreshes or polling. The messaging system operates
alongside the main three-tier architecture, with the WebSocket server
handling message routing while message storage and retrieval still
utilize the standard data layer.

**Session Management**

User authentication and session management are implemented using secure,
HTTP-only cookies that store session identifiers. When a user logs in
successfully, the server creates a session record and sends a session
cookie to the browser. Subsequent requests include this cookie, allowing
the server to identify the user and maintain their logged-in state.
Sessions expire after 24 hours of inactivity as specified in the
non-functional requirements (NFR-2.3).

**Security Layer**

Security is integrated across all architectural layers rather than being
a separate component. Key security implementations include:

- Input validation and sanitization at the presentation and application
  logic layers

- Password hashing using bcrypt before storage in the data layer

- HTTPS encryption for all data transmission

- CSRF token validation for form submissions

- Prepared statements and parameterized queries to prevent SQL injection

<!-- -->

- **Technology Stack Summary**

The complete technology stack for the Khubrah-Link platform includes:

- **Frontend Technologies**

  - HTML5, CSS3, JavaScript

  - Bootstrap or Tailwind CSS for responsive design framework

  - jQuery or Vanilla JavaScript for DOM manipulation and AJAX requests

- **Backend Technologies**

  - Server-side language: PHP, Node.js, or Python (specified in Chapter
    5)

  - Web framework: Laravel, Express, Django, or Flask

  - WebSocket library for real-time messaging

- **Database**

  - Relational DBMS: MySQL, PostgreSQL, or SQLite

  - ORM/Database Abstraction Layer provided by the chosen framework

- **Development and Deployment Tools**

  - Version Control: Git with GitHub repository

  - Web Server: Apache or Nginx

  - Development Environment: Local development servers (XAMPP, MAMP, or
    built-in framework servers)

This architectural design provides a solid foundation for implementing
all the functional requirements specified in Chapter 3 while maintaining
the flexibility to accommodate future enhancements beyond the initial
10-week development period.

## Database Design

Database design is a critical component of system design that determines
how data will be organized, stored, and accessed within the application.
A well-designed database ensures data integrity, supports efficient
queries, minimizes redundancy, and provides a solid foundation for
implementing the system's functional requirements. This section presents
the detailed database design for the Khubrah-Link platform, building
upon the Entity-Relationship diagram presented in Chapter 3.

The database design follows relational database principles, with data
organized into tables (relations) consisting of rows (records) and
columns (attributes). The design adheres to normalization principles to
reduce data redundancy and maintain consistency. All tables include
appropriate primary keys for unique identification, foreign keys to
establish relationships, and constraints to enforce data integrity
rules.

### Database Tables

This subsection provides detailed specifications for each table in the
Khubrah-Link database, including column names, data types, constraints,
and descriptions. The database consists of eight primary tables that
store all platform data.

| Col. Name | Data Type | Constraints | Description |
|:--:|:--:|:--:|:--:|
| user_id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each user |
| email | VARCHAR(255) | UNIQUE, NOT NULL | User's email address (used for login) |
| password_hash | VARCHAR(255) | NOT NULL | Bcrypt hashed password |
| full_name | VARCHAR(100) | NOT NULL | User's full name |
| phone_number | VARCHAR(20) | NULL | Contact phone number |
| location | VARCHAR(100) | NOT NULL | City or neighborhood |
| profile_picture | VARCHAR(255) | NULL | Path to profile image file |
| bio | TEXT | NULL | User biography/about section |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | Account creation date |
| email_verified | BOOLEAN | DEFAULT FALSE | Email verification status |
| is_active | BOOLEAN | DEFAULT TRUE | Account active status |

<span id="_Toc211410423" class="anchor"></span>Table ‎4.1: Users Table
Structure

The users table stores all registered user accounts on the platform.
Each user has a unique identifier and can act as both a skill provider
and a skill seeker.

- **Indexes**

  - Index on email for fast login queries

  - Index on location for location-based searches

| Col. Name | Data Type | Constraints | Description |
|:--:|:--:|:--:|:--:|
| skill_id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each skill |
| skill_name | VARCHAR(100) | UNIQUE, NOT NULL | Name of the skill |
| category | VARCHAR(50) | NOT NULL | Skill category (e.g., Technology, Arts) |
| description | TEXT | NULL | General description of the skill |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | When skill was added to system |

<span id="_Toc211410424" class="anchor"></span>Table ‎4.2: Skills Table
Structure

The skills table contains the master list of skills available on the
platform. Each skill is categorized and can be associated with multiple
users.

- **Indexes**

  - Index on skill_name for search functionality

  - Index on category for filtering by category

- **Predefined Categories:** Technology, Arts & Crafts, Languages,
  Music, Sports, Home & Garden, Business Skills, Cooking & Culinary,
  Health & Fitness, Academic Subjects<span id="_Toc211410425"
  class="anchor"></span>

| Col. Name | Data Type | Constraints | Description |
|:--:|:--:|:--:|:--:|
| user_skill_id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each record |
| user_id | INT | FOREIGN KEY (users.user_id), NOT NULL | Reference to user |
| skill_id | INT | FOREIGN KEY (skills.skill_id), NOT NULL | Reference to skill |
| skill_type | ENUM('teach', 'learn') | NOT NULL | Whether user teaches or wants to learn |
| experience_level | VARCHAR(50) | NULL | Beginner, Intermediate, Advanced, Expert |
| description | TEXT | NULL | User's specific description for this skill |
| preferred_mode | ENUM('in-person', 'online', 'both') | DEFAULT 'both' | Preferred teaching/learning mode |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | When skill was added to profile |

Table ‎4.3: User_Skills Table Structure

The user_skills table is a junction table that resolves the many-to-many
relationship between users and skills. It indicates which skills a user
can teach or wants to learn.

- **Constraints:** UNIQUE constraint on (user_id, skill_id, skill_type)
  to prevent duplicate entries

- **Indexes:**

  - Composite index on (user_id, skill_type) for profile queries

  - Index on skill_id for reverse lookups

| Col. Name | Data Type | Constraints | Description |
|:--:|:--:|:--:|:--:|
| session_id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each session |
| provider_id | INT | FOREIGN KEY (users.user_id), NOT NULL | User providing the skill |
| learner_id | INT | FOREIGN KEY (users.user_id), NOT NULL | User learning the skill |
| skill_id | INT | FOREIGN KEY (skills.skill_id), NOT NULL | Skill being taught |
| session_date | DATE | NOT NULL | Date of the session |
| session_time | TIME | NOT NULL | Start time of the session |
| duration | INT | DEFAULT 60 | Session duration in minutes |
| location_type | ENUM('in-person', 'online') | NOT NULL | Session mode |
| location_details | VARCHAR(255) | NULL | Specific location or online meeting link |
| status | ENUM('pending', 'confirmed', 'completed', 'cancelled') | DEFAULT 'pending' | Current session status |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | When session was requested |
| updated_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | Last status update |

<span id="_Toc211410426" class="anchor"></span>Table ‎4.4: Sessions Table
Structure

The sessions table stores all learning session bookings between
providers and learners.

- **Constraints:** CHECK constraint: provider_id ≠ learner_id (user
  cannot book with themselves)

- **Indexes:**

  - Index on provider_id for provider's session list

  - Index on learner_id for learner's session list

  - Composite index on (session_date, session_time) for scheduling
    queries

  - Index on status for filtering sessions by status

| Col. Name | Data Type | Constraints | Description |
|:--:|:--:|:--:|:--:|
| review_id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each review |
| session_id | INT | FOREIGN KEY (sessions.session_id), NOT NULL | Session being reviewed |
| reviewer_id | INT | FOREIGN KEY (users.user_id), NOT NULL | User submitting the review |
| reviewee_id | INT | FOREIGN KEY (users.user_id), NOT NULL | User being reviewed |
| rating | INT | NOT NULL, CHECK (rating \>= 1 AND rating \<= 5) | Star rating (1-5) |
| review_text | TEXT | NOT NULL | Written feedback |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | When review was submitted |
| is_visible | BOOLEAN | DEFAULT FALSE | Visibility status (becomes true after both reviews submitted or 7 days) |

<span id="_Toc211410427" class="anchor"></span>Table ‎4.5: Reviews Table
Structure

The reviews table stores ratings and feedback submitted after completed
sessions. Each session can have up to two reviews (one from each
participant).

- **Constraints:** UNIQUE constraint on (session_id, reviewer_id) to
  prevent duplicate reviews from same user

- **Indexes:**

  - Index on reviewee_id for fetching user's received reviews

  - Index on session_id for session-related review queries

| Col. Name | Data Type | Constraints | Description |
|:--:|:--:|:--:|:--:|
| message_id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each message |
| sender_id | INT | FOREIGN KEY (users.user_id), NOT NULL | User sending the message |
| receiver_id | INT | FOREIGN KEY (users.user_id), NOT NULL | User receiving the message |
| message_text | TEXT | NOT NULL | Message content |
| is_read | BOOLEAN | DEFAULT FALSE | Whether message has been read |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | When message was sent |

<span id="_Toc211410428" class="anchor"></span>Table ‎4.6: Messages Table
Structure

The messages table stores all private conversations between users.

- **Indexes:**

  - Composite index on (sender_id, receiver_id, created_at) for
    conversation queries

  - Index on receiver_id and is_read for unread message counts

| Col. Name | Data Type | Constraints | Description |
|:--:|:--:|:--:|:--:|
| admin_id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for admin |
| username | VARCHAR(50) | UNIQUE, NOT NULL | Admin username |
| password_hash | VARCHAR(255) | NOT NULL | Bcrypt hashed password |
| email | VARCHAR(255) | UNIQUE, NOT NULL | Admin email address |
| full_name | VARCHAR(100) | NOT NULL | Administrator's name |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | When admin account was created |
| last_login | TIMESTAMP | NULL | Last login timestamp |

<span id="_Toc211410429" class="anchor"></span>Table ‎4.7: Administrators
Table Structure

The administrators table stores system administrator accounts with
elevated privileges.

| Col. Name | Data Type | Constraints | Description |
|:--:|:--:|:--:|:--:|
| report_id | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each report |
| reporter_id | INT | FOREIGN KEY (users.user_id), NOT NULL | User making the report |
| content_type | ENUM('profile', 'review', 'message') | NOT NULL | Type of content reported |
| content_id | INT | NOT NULL | ID of the reported content |
| reason | VARCHAR(255) | NOT NULL | Reason for reporting |
| status | ENUM('pending', 'reviewed', 'dismissed', 'action_taken') | DEFAULT 'pending' | Report status |
| admin_notes | TEXT | NULL | Administrator's notes on the report |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP | When report was submitted |
| reviewed_at | TIMESTAMP | NULL | When report was reviewed |

<span id="_Toc211410430" class="anchor"></span>Table ‎4.8:
Reported_Content Table Structure

The reported_content table stores user reports of inappropriate content
for administrator review.

- **Indexes**

  - Index on status for filtering pending reports

  - Composite index on (content_type, content_id) for content lookup

### Database Relationships Schema

This subsection describes the relationships between tables, including
cardinality, referential integrity rules, and cascading behaviors. These
relationships implement the connections defined in the
Entity-Relationship diagram from Chapter 3.

**Relationship 1: users ↔ user_skills (One-to-Many)**

- **Cardinality:** One user can have many skill entries (both teaching
  and learning)

- **Implementation:** user_skills.user_id is a foreign key referencing
  users.user_id

- **Referential Integrity:**

  - ON DELETE CASCADE: If a user account is deleted, all their skill
    entries are automatically removed

  - ON UPDATE CASCADE: If a user_id is updated, all references are
    updated

- **Business Rule:** A user must have at least one skill (either teach
  or learn) to fully utilize the platform

**Relationship 2: skills ↔ user_skills (One-to-Many)**

- **Cardinality:** One skill can be associated with many users

- **Implementation:** user_skills.skill_id is a foreign key referencing
  skills.skill_id

- **Referential Integrity:**

  - ON DELETE RESTRICT: Cannot delete a skill if it is referenced by any
    user

  - ON UPDATE CASCADE: Skill ID updates propagate to user_skills

- **Business Rule:** Skills are maintained as a master list and shared
  across all users

**Relationship 3: users ↔ sessions (Two One-to-Many Relationships)**

- **Cardinality (as Provider):** One user can provide many sessions

- **Cardinality (as Learner):** One user can learn in many sessions

- **Implementation:**

  - sessions.provider_id is a foreign key referencing users.user_id

  - sessions.learner_id is a foreign key referencing users.user_id

- **Referential Integrity:**

  - ON DELETE SET NULL: If a user is deleted, their sessions remain but
    the user reference is set to NULL (for historical record keeping)

  - ON UPDATE CASCADE: User ID updates propagate to all session records

- **Business Rule:** A single session connects exactly two users in
  provider and learner roles

**Relationship 4: skills ↔ sessions (One-to-Many)**

- **Cardinality:** One skill can be the subject of many sessions

- **Implementation:** sessions.skill_id is a foreign key referencing
  skills.skill_id

- **Referential Integrity:**

  - ON DELETE RESTRICT: Cannot delete a skill if it has associated
    sessions

  - ON UPDATE CASCADE: Skill ID updates propagate to sessions

- **Business Rule:** Each session is explicitly linked to the skill
  being taught

**Relationship 5: sessions ↔ reviews (One-to-Many)**

- **Cardinality:** One session can have multiple reviews (maximum two:
  one from provider, one from learner)

- **Implementation:** reviews.session_id is a foreign key referencing
  sessions.session_id

- **Referential Integrity:**

  - ON DELETE CASCADE: If a session is deleted, all associated reviews
    are removed

  - ON UPDATE CASCADE: Session ID updates propagate to reviews

- **Business Rule:** Reviews can only be submitted for sessions with
  status 'completed'

**Relationship 6: users ↔ reviews (Two One-to-Many Relationships)**

- **Cardinality (as Reviewer):** One user can write many reviews

- **Cardinality (as Reviewee):** One user can receive many reviews

- **Implementation:**

  - reviews.reviewer_id is a foreign key referencing users.user_id

  - reviews.reviewee_id is a foreign key referencing users.user_id

- **Referential Integrity:**

  - ON DELETE CASCADE: If a user is deleted, all reviews they wrote or
    received are deleted

  - ON UPDATE CASCADE: User ID updates propagate to review records

- **Business Rule:** A user cannot review themselves; reviewer and
  reviewee must be different

**Relationship 7: users ↔ messages (Two One-to-Many Relationships)**

- **Cardinality (as Sender):** One user can send many messages

- **Cardinality (as Receiver):** One user can receive many messages

- **Implementation:**

  - messages.sender_id is a foreign key referencing users.user_id

  - messages.receiver_id is a foreign key referencing users.user_id

- **Referential Integrity:**

  - ON DELETE CASCADE: If a user is deleted, all their sent and received
    messages are deleted

  - ON UPDATE CASCADE: User ID updates propagate to message records

- **Business Rule:** Messages are one-to-one communications between two
  users

**Relationship 8: users ↔ reported_content (One-to-Many)**

- **Cardinality:** One user can submit many reports

- **Implementation:** reported_content.reporter_id is a foreign key
  referencing users.user_id

- **Referential Integrity:**

  - ON DELETE SET NULL: If reporting user is deleted, reports remain but
    reporter is anonymized

  - ON UPDATE CASCADE: User ID updates propagate to reports

- **Business Rule:** Users can report inappropriate content for
  administrator review

**Database Integrity Constraints Summary:**

Beyond foreign key relationships, the database enforces several
additional integrity constraints:

1.  **Check Constraints:**

    - reviews.rating must be between 1 and 5

    - sessions.provider_id must not equal sessions.learner_id

2.  **Unique Constraints:**

    - users.email must be unique (no duplicate accounts)

    - skills.skill_name must be unique (no duplicate skill entries)

    - Combination of (user_id, skill_id, skill_type) in user_skills must
      be unique

    - Combination of (session_id, reviewer_id) in reviews must be unique

3.  **Not Null Constraints:**

    - Critical fields like email, password_hash, full_name cannot be
      NULL

    - Foreign keys in junction tables cannot be NULL

4.  **Default Values:**

    - Timestamps default to CURRENT_TIMESTAMP

    - Boolean fields have appropriate defaults (e.g., email_verified
      defaults to FALSE)

    - Enum fields have defaults where appropriate (e.g., status defaults
      to 'pending')

**Normalization Verification:**

The database design adheres to Third Normal Form (3NF):

- **First Normal Form (1NF):** All tables have atomic values (no
  repeating groups or arrays)

- **Second Normal Form (2NF):** All non-key attributes are fully
  dependent on the primary key

- **Third Normal Form (3NF):** No transitive dependencies exist; non-key
  attributes depend only on the primary key

This normalized structure minimizes data redundancy, ensures data
consistency, and provides a solid foundation for efficient queries and
data manipulation operations throughout the application.

## UML Design Diagrams

Unified Modeling Language (UML) diagrams are standardized visual
representations used in software engineering to model the structure and
behavior of systems. For the Khubrah-Link platform, UML design diagrams
help visualize dynamic interactions between system components and
illustrate how objects collaborate to fulfill specific use cases. This
section presents sequence diagrams that depict the temporal flow of
messages between objects during key operations, and a class diagram that
shows the static structure of the system's object-oriented design.

### Sequence Diagrams

<span id="_Toc212095367" class="anchor"></span>Figure ‎4.1: User
Registration Process

This diagram shows the complete registration workflow including email
verification and password hashing.

<span id="_Toc212095368" class="anchor"></span>Figure ‎4.2: Search for
Skill Providers

This diagram illustrates the search process with filters and database
queries.

<span id="_Toc212095369" class="anchor"></span>Figure ‎4.3: Session
Booking Request

This diagram demonstrates the session booking process with availability
checking.

<span id="_Toc212095370" class="anchor"></span>Figure ‎4.4: Submit Review

This diagram shows the review submission process with validation and
rating calculation.

### Class Diagram

The class diagram presents the static structure of the Khubrah-Link
system, showing the main classes, their attributes, methods, and the
relationships between them. This diagram serves as a blueprint for the
object-oriented implementation of the platform.

<span id="_Toc212095371" class="anchor"></span>Figure ‎4.5: Class Diagram
for Khubrah-Link System

The class diagram illustrates seven main classes: User, Skill,
UserSkill, Session, Review, Message, and Administrator. Key
relationships include:

- User-UserSkill-Skill: A many-to-many relationship resolved through the
  UserSkill junction table, allowing users to offer or seek multiple
  skills.

- User-Session: Two one-to-many relationships where users act as either
  providers or learners in sessions.

- Session-Review: A composition relationship where each session can have
  up to two reviews (one from each participant).

- Administrator-User: An inheritance relationship where Administrator
  extends the User class with additional administrative privileges.

This design follows object-oriented principles and supports all
functional requirements specified in Chapter 3.

***Chapter 5***

# SYSTEM IMPLEMENTATION

## Overview 

***Chapter 6***

# SYSTEM INTERFACES

## Overview

***Chapter 7***

# TESTING AND DEPLOYMENT

## Overview

<span id="_Toc205080079" class="anchor"></span>CONCLUSION

<span id="_Toc212095438" class="anchor"></span>REFERENCES

The End

<span dir="rtl">تم بحمد الله وتوفيقه</span>
